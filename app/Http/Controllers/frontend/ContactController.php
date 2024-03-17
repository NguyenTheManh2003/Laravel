<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Mail\ContactMail;
use App\Mail\DemoMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function contact()
    {
        return view('backend.contact.index');
    }
    // public function postContact(Request $request)
    // {
    //     $request->validate([
    //         'fullname' => 'required|string|max:255',
    //         'email' => 'required|email|max:255',
    //         'message' => 'required|string',
    //     ]);

    //     $name = $request->input('fullname');
    //     $email = $request->input('email');
    //     $message = $request->input('message');

    //     // Save contact to the database
    //     Contact::create([
    //         'fullname' => $name,
    //         'email' => $email,
    //         'message' => $message,
    //     ]);

    //     Mail::to('webfw@pmk.io.vn')->send(new ContactMail($name, $email, $message));
    //     return redirect()->route('Contact.page')->with('success', 'Message sent successfully and saved to the database!');
    // }

    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            //'g-recaptcha-response' => 'recaptcha',
            // OR since v4.0.0
            recaptchaFieldName() => recaptchaRuleName()
        ]);
        // check if validator fails
        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->route('contact.contact')->with("error", "Xin hãy chọn reCaptcha trước khi gửi!");
        } else {
            $contact = new Contact();
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->phone = $request->phone;
            $contact->message = $request->message;
            if ($contact->save()) {
                //Bắt đầu gửi email
                $mailData = [
                    'title' => 'Mail trả lời tự động SaleB603- mục Liên hệ',
                    'body' => 'Đây là email tự động được gửi từ hệ thống,cảm ơn bạn đã liên hệ với chúng tôi.'
                ];
                Mail::to($request->email)->send(new DemoMail($mailData));
                //Sau khi gửi email thành công thì sẽ thông báo
                return redirect()->back()->with("success", "Thông tin của bạn đã được gửi đến hệ thống thành công");
            } else {
                return redirect()->back()->with("Error", "Thông tin gửi đã thất bại !");
            }
        }
    }
}