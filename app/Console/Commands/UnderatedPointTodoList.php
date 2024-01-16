<?php

namespace App\Console\Commands;

use App\Models\Cronjob;
use App\Models\Domain;
use App\Models\Reminder;
use App\Models\Todo;
use App\Models\User;
use App\Services\Woowa\Woowa;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Response;

class UnderatedPointTodoList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:underated-point-todo-list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function handle()
    {
        $user = Reminder::all();
        $todoData = [];

        $currentDateTime = Carbon::now();

        foreach ($user as $users) {
            $todos = $users->users->todos()->whereDate('doneAt', $currentDateTime->toDateString())
                ->whereTime('doneAt', '<', $currentDateTime->toTimeString())
                ->get();

            $todoCount = $todos->count();
            if ($todoCount < 2) {
                $todoData[$users->users->name]['user'] = $users->users;
                $todoData[$users->users->name]['todos'] = $todos->toArray();
                $todoData[$users->users->name]['count'] = $todos->count();
            }
        }
        foreach ($todoData as $data) {
            if ($data['count'] == 0) {
                $messages = '*REMINDER!!*

Haii ' . $data['user']->name . ', Anda Belum Mengumpulkan Point Hari Ini, Terus Semangat Bekerja Yaaa!!';
            } else {
                $messages = '*REMINDER!!*

Haii ' . $data['user']->name . ', Anda Hanya Mengerjakan ' . $data['count'] . ' Point Hari Ini, Terus Semangat Bekerja Yaaa!!';
            }
            $whatsapp = new Woowa();
            $whatsapp->sendWhatsapp($data['user']->no_hp, $messages);
        }
    }
}
