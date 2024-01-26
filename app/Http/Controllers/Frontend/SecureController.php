<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Mail\Sendmail;
use Bcrypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class SecureController extends Controller
{
    function login(Request $request)
    {

        if ($request->isMethod("post")) {
            $this->validate($request, [
                'email' => 'required|email|exists:account,email',
                'password' => 'required|alpha_num|min:6|max:32',
            ]);

            echo $email = $request->email;
            echo $password = $request->password;
            echo $remember = $request->remember;

            if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
                if (Auth::user()->status == 1) {
                    return redirect()->route('fe.home');
                } else {
                    Auth::logout();
                    Session::flash('note', 'The account has been banned');
                    return redirect()->route('fe.login');
                }
            } else {
                Session::flash('note', 'False account and password');
                return redirect()->route('fe.login');
            }
        }


        return view('frontend.pages.login');
    }

    function register(Request $request)
    {
        if ($request->isMethod("post")) {
            $this->validate($request, [
                "fullname" => "required|min:6|max:32",
                "address" => "required|min:6|max:150",
                "email" => "required|email|unique:account,email",
                "username" => "required|alpha_num|min:6|max:32",
                "password" => "required|alpha_num",
                "phone" => "required|numeric",
            ]);
            $register = new Account();
            $register->fullname = $request->fullname;
            $register->address = $request->address;
            $register->email = $request->email;
            $register->username = $request->username;
            $register->password = bcrypt($request->password);
            $register->phone = $request->phone;
            $register->role = 0;

            $register->save();
            return redirect()->route("fe.login");
        } else {
            return view('frontend.pages.register');
        }
    }
    function logout()
    {
        Auth::logout();
        return redirect()->route("fe.home");
    }

    function forget(Request $request)
    {
        if ($request->isMethod("post")) {
            $this->validate($request, [
                'email' => 'required|email|exists:account,email',

            ]);
            $email = $request->email;
            //load use
            $user = Account::where('status', 1)->where('email', $email)->first();
            $passmoi = tv_taochuoi();
            $this->guimail($email, $passmoi);

            DB::table('account')->where('id', $user->id)->update(array('password' => bcrypt($passmoi)));
            Session::flash('note', 'Mật khẩu mới đã được gữi về email của bạn');
            return redirect()->route('fe.login');

            // echo "<pre>";
            // echo $user;
            // echo "<pre>";
        }
        return view('frontend.pages.forget');
    }

    public function guimail($mail = null, $password = null)
    {
        $data = [
            'frommail' => 'pahana.vn@gmail.com',
            'fromname' => 'LightMyDesk',
            'title' => 'Khôi phục mật khẩu',
            'message' => 'Yêu cầu khôi phục mật khẩu của bạn tại web.com đã được chấp
       nhận. Mật khẩu mới của bạn là : ' . $password,
        ];
        Mail::to($mail)->send(new Sendmail($data));
    }

    

    function profile()
    {
        $auth = Auth::user();
        return view("frontend.pages.profile", compact('auth'));
    }

    function check_profile(Request $request)
    {
        $auth = Auth::user();
        $request->validate([
            "fullname" => "required|min:6|max:32",
            "address" => "required|min:6|max:150",
            "email" => "required|email|unique:account,email," . $auth->id,
            "username" => "required|alpha_num|min:6|max:32",
            "password" => ['required', function ($attr, $value, $fail) use ($auth) {
                if (!Hash::check($value, $auth->password))
                    return $fail('Your password does not match');
            }],
            "phone" => "required|numeric",
        ]);
        $data = $request->only('username', 'address', 'email', 'fullname', 'phone', 'role');

        $check = $auth->update($data);
        if ($check) {
            return redirect()->back()->with('Ok', 'Update your profile successfuly');
        }
        return redirect()->back()->with('No', 'Something error has happened, Please try again');
    }

    function change_password()
    {
        return view('frontend.pages.change_password');
    }

    function check_change_password(Request $request)
    {
        if ($request->isMethod("post")) {
            $request->validate([
                'password_old' => 'required',
                'password' => 'required|alpha_num|min:4|max:32',
                'password_confirm' => 'required|same:password',
            ], [
                'password_old.required' => 'Your password does not match', // Thông báo khi mật khẩu cũ không đúng
                'password_confirm.same' => 'New password and confirm password must match', // Thông báo khi mật khẩu xác nhận không khớp
            ]);

            $user = Auth::user();

            if (Hash::check($request->password_old, $user->password)) {
                $user->password = bcrypt($request->password);
                $user->save();
                Auth::logout();
                return redirect()->route("fe.login");
            } else {
                return back()->withErrors(['password_old' => 'Your password does not match']);
            }
        }

        return view('frontend.pages.change_password');
    }
}
