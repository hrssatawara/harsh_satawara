<?php

namespace App\Console\Commands;

use App\Events\BirthdayWishEvent;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Console\Command;

class BirthdayWish extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'birthday:wish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Employee::chunk(10,function ($employees){
            foreach ($employees as $employee){
                $today = Carbon::now()->format('d-m');
                $date = Carbon::createFromFormat('Y-m-d', $employee->birthdate)->format('d-m');
                if ($today == $date){
                    event(new BirthdayWishEvent($employee));
                }
            }
        });
        return Command::SUCCESS;
    }
}
