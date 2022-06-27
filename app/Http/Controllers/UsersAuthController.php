<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;


class UsersAuthController extends Controller
{
        public function userList()
        {
            $data['title'] = 'Data Users';
            $data['meta'] = 'User';
            $data['list'] = User::orderBy('id','desc')->paginate(10);
            return view('user/userList', $data);    
        }


       public function register()
        {
        $data['title'] = 'Register';
        return view('user/register', $data);
        }

        public function register_action(Request $request)
       {
        $request->validate([
            'name' => 'required',
            'birthplace' => 'required',
            'birthdate' => 'required',
            'gender' =>'required',
            'email' => 'required|unique:tbl_user',
            'password' => 'required',
        ]);

        $regis = new User([
            'name' => $request->name,
            'birthplace' => $request->birthplace,
            'birthdate' => date("Y-m-d",strtotime($request->birthdate)),
            'gender' => $request->gender,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $regis->save();
        return redirect()->route('login')->with('betul', 'Registration success. Please login!');
       }


       public function login()
        {
        $data['title'] = 'Login';
        return view('home', $data);
        }

       public function login_action(Request $request)
       {
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/')->with('success', 'Anda Berhasil Login');
        }
            return back()->withErrors([
                'salah' => 'Wrong username or password',
            ]);
       }

       public function password()
       {
           $data['title'] = 'Change Password';
           return view('user/password', $data);
       }

       public function password_action(Request $request)
       {
           $request->validate([
               'old_password' => 'required|current_password',
               'new_password' => 'required|confirmed',
           ]);
           $user = User::find(Auth::id());
           $user->password = Hash::make($request->new_password);
           $user->save();
           $request->session()->regenerate();
           return back()->with('success', 'Password changed!');
       }

       public function edit(Request $request)
       {
        $request->validate([
            'name' => 'required',
            'birthplace' => 'required',
            'birthdate' => 'required',
            'gender' =>'required',
            'email' => 'required|unique:tbl_user',
        ]);

        $regis = new User([
            'name' => $request->name,
            'birthplace' => $request->birthplace,
            'birthdate' => date("Y-m-d",strtotime($request->birthdate)),
            'gender' => $request->gender,
            'email' => $request->email,
        ]);
       }

       
       public function userDelete($id)
       {
        
       }
       public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}
