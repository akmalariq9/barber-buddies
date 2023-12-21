<?php

namespace App\Console;

use App\Models\Reservation;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            $reservations = Reservation::where('status', '!=', 'complete')->get();
            foreach ($reservations as $reservation) {
                $date = $reservation->reservation_datetime;
                $date = strtotime($date);
                $date = strtotime("+7 day", $date);
                $date = date('Y-m-d', $date);
                $now = date('Y-m-d');
                if ($date < $now) {
                    $reservation->status = 'complete';
                    $reservation->save();
                }
            }
        })->daily();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}