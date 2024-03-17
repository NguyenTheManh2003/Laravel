<?php
namespace App\Http\Controllers;

use App\Mail\DemoMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;



class MailController extends Controller
{
    //
    public function index(){
        $mailData = [
            'title'=>'Nguyen the Manh',
            'body'=>'Đây là email test sử dụng giao thức smtp'
        ];

        Mail::to('webfw@pmk.io.vn')->send(new DemoMail($mailData));
        dd('Email đã gửi thành công');    
    }

}