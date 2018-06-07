<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Task;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\Reminder;

class TasksReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:remind';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a reminder email to users one day before tasks deadlines';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $tasks = Task::all();
	$toRemind = [];
	
	foreach ($tasks as $task) {
		$deadline = Carbon::parse($task->deadline);
		$now = Carbon::now();

		if ($deadline > $now && $deadline->diffInHours($now) <= 24) {
			foreach ($task->users as $user) {
				$toRemind[$user->email][] = $task;
			}
		}
	}

	foreach ($toRemind as $email => $tasks) {
		Mail::to($email)->send(new Reminder($tasks));
	}
    }
}
