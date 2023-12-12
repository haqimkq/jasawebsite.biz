<?php

namespace App\Console\Commands;

use App\Models\Cronjob;
use App\Models\Domain;
use App\Models\Todo;
use App\Models\User;
use App\Services\Woowa\Woowa;
use Carbon\Carbon;
use Illuminate\Console\Command;

class GenerateTodoList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-todo-list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function handle()
    {

        $cronjob = Cronjob::whereDate('date', Carbon::now()->format('d'))
            ->whereRaw("DATE_FORMAT(time, '%H:%i') = '" . Carbon::now()->format('H:i') . "'")
            ->get();

        foreach ($cronjob as $data) {

            if (count($data->domains) > 0) {
                foreach ($data->domains as $domainId) {
                    $nama_domain = $domainId;
                    $domainName = $nama_domain->nama_domain;
                    $todo = new Todo();
                    $todo->subject = $data->subject;
                    $todo->catatan = $data->catatan;
                    $todo->save();
                    $todo->domains()->attach($domainId);
                    $todo->users()->attach($data->users);
                }
            } else {
                $todo = new Todo();
                $todo->subject = $data->subject;
                $todo->catatan = $data->catatan;
                $todo->save();
                $todo->users()->attach($data->users);
            }


            $namaDomainString = '';
            $index = 0;

            if (count($data->domains) > 0) {
                $namaDomainString .= $index + 1 . '. ' . $domainName . '\n';
                $index++;
            } else {
                $namaDomainString = '-';
            }
            $user = [];
            foreach ($data->users as $users) {
                $user[] = $users;
            }
            foreach ($user as $item) {
                $messages = 'Hi ' . $item->name . ' , Anda Memiliki Tugas baru !!
Nama Domain :
' . $namaDomainString . '
Subject :
' . $data->subject . '
Keterangan :
' . $data->catatan;
                $whatsapp = new Woowa();
                $response =  $whatsapp->sendWhatsapp($item->no_hp, $messages);
            }
        }
    }
}
