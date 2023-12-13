<?php

namespace App\Console;

use App\Models\Cronjob;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $cronjob = Cronjob::whereDate('date', Carbon::now()->format('d'))
            ->whereRaw("DATE_FORMAT(time, '%H:%i') >= '" . Carbon::now()->format('H:i') . "'")
            ->get();
        if (count($cronjob) > 0) {
            $data = $cronjob[0];

            $time = $data->time;
            $date = $data->date;
            $carbonTime = Carbon::createFromFormat('H:i:s', $time);
            $formattedTime = $carbonTime->format('H:i');
            $schedule->command('app:generate-todo-list');
        }
    }


    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
