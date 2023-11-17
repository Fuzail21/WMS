<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class SendMailController extends Controller
{
    public function index(){
        $mailData = [
            'title'=> 'The Tech IO',
            'body'=> 'This Mail is for testing purpose'
        ];

        $attachmentPath = 'img\20-20-Logo-Color.png';


        Mail::to('aptech.haseebsiddiqui@gmail.com')->send(new SendMail($mailData, $attachmentPath));
        dd('Email Send Successfully');
    }



    public function formsubmit(Request $request){
        $radiooption = $request->input('myRadioGroup');
        dd($radiooption);
    }
}
