<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use League\Csv\Writer;

class DispensingDataBackupAndPurge extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:dispensing-data-backup-and-purge';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Backup and purge dispensing data.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $recordCount = DB::table('dispensing_data')->count();
        $maxRecordCount = 10000;

        if ($recordCount > $maxRecordCount) {
            $this->info('Data exceeds 100,000 records. Backing up and purging data.');

            $data = DB::table('dispensing_data')->get();

            $csvFileName = 'dispensing_data_backup_' . now()->format('Ymd_His') . '.csv';
            $csv = Writer::createFromString('');
            $csv->setDelimiter(';');
            $csv->insertOne(array_keys((array)$data->first()));

            foreach ($data as $row) {
                $csv->insertOne((array)$row);
            }

            Storage::disk('local')->put($csvFileName, $csv->toString());

            DB::table('dispensing_data')->truncate();

            $this->info('Data backed up to ' . $csvFileName . ' and purged from database.');
        } else {
            $this->info('Data does not exceed 100,000 records. No action taken.');
        }

    }
}
