<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Schedule::command('app:dispensing-data-backup-and-purge')
    ->monthlyOn(1, '00:00');
