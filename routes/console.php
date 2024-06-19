<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('app:dispensing-data-backup-and-purge')
    ->monthlyOn(1, '00:00');
Schedule::command('app:update-register-key')
    ->dailyAt('00:00');
