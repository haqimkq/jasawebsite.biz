<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    public function index()
    {
        return view('contactForm');
    }
    public function send(Request $request)
    {
        $this->validate($request, [
            'name'     =>  'required',
            'email'  =>  'required',
            'message' =>  'required'
        ]);
        // dd($request);

        $charactersToRemove = ['0', '62'];
        $string = ltrim($request->email, implode('', $charactersToRemove));
        $data = array(
            'name'      =>  $request->name,
            'email'      => '+62' . $string,
            'message'   =>   $request->message
        );

        Mail::to('ardanwungkul143@gmail.com')->send(new SendMail($data));
        return back();
    }
}
