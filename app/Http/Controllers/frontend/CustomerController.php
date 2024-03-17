<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\Customer;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index()
    {
        return view('frontend.customer.register');
    }

    public function register(RegisterRequest $request)
    {
        //$validator = Validator::make(request()->all());

        if ($request->validated) {
            return redirect()->route('reg.index')->with('Error', 'Da co loi nhap thong tin dang ky');
        } else {
            // them thong tin khach hang
            $cust = new Customer();
            $cust->name = $request->name;
            $cust->email = $request->email;
            $cust->address = $request->address;
            $cust->phone = $request->phone;
            $cust->province = $request->province;
            if ($cust->save()) {
                $acc = new Account();
                $acc->email = $request->email;
                $acc->password = Hash::make($request->password);
                $acc->active = 1;
                if ($acc->save()) {
                    return redirect()->route('login')->with('Success', 'ban da dang ki thanh cong! ');
                } else {
                    return redirect()->route('reg.index')->with('Error', 'dang ki that bai! ');
                }
            }
            else{
                return redirect()->route('reg.index')->with('Error', 'dang ki nguoi dung that bai! ');
            }
        }
    }
}