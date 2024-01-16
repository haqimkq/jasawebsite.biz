<?php

namespace App\Http\Controllers;

use App\Models\Reminder;
use App\Models\User;
use Illuminate\Http\Request;

class ReminderController extends Controller
{
    public function create()
    {
        $reminder = Reminder::all();
        $user = User::where('isAdmin', false)->where('isSupport', true)->get();
        return view('master.reminder.create', compact('user', 'reminder'));
    }
    public function store(Request $request)
    {
        Reminder::truncate();
        foreach ($request->user as $user) {
            $reminder = new Reminder;
            $reminder->user_id = $user;
            $reminder->save();
        }

        return redirect()->back();
    }
}
