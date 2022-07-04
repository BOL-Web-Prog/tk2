<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Permission;
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
            //$data['list'] = User::orderBy('id','desc')->paginate(10);
            $data['list'] = User::leftjoin('tbl_permission', function($join){
                $join->on('tbl_user.id','=','tbl_permission.id_user');
            })->orderBy('tbl_user.id','desc')->paginate(10);
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

        $registered_user = DB::table('tbl_user')->count();
        if($registered_user==0){
            $role='admin';
        }else{
            $role='user';
        }
       

        $regis = new User([
            'name' => $request->name,
            'birthplace' => $request->birthplace,
            'birthdate' => date("Y-m-d",strtotime($request->birthdate)),
            'gender' => $request->gender,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $regis->save();
        $permissionUpdate = new Permission([
            'id_user'=>$regis->id,
            'permission'=>$role
        ]);
        $permissionUpdate->save();
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
            $getId = User::where('email',$request->email)->first('id');
            $getRole = Permission::where('id_user',$getId['id'])->first('permission');
            Session::put('role',$getRole['permission']);        
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

       public function userUpdate(Request $request)
       {
        $request->validate([
            'name' => 'required',
            'birthplace' => 'required',
            'birthdate' => 'required',
            'gender' =>'required',
            'email' => 'required',
            'permission'=>'required'
        ]);
        $update = User::find($request->id);
        $update->name =  $request->name;
        $update->birthplace =  $request->birthplace;
        $update->birthdate =  date("Y-m-d",strtotime($request->birthdate));
        $update->gender =  $request->gender;
        $update->email =  $request->email;
        $update->save();

        $permissionUpdate = new Permission([
            'id_user'=>$request->id,
            'permission'=>$request->permission
        ]);
        $permissionUpdate->save();

        return redirect()->intended('userList')->with('success', 'Data user berhasil diupdate');
       }

       
       public function userDelete($id)
       {
        $user=User::find($id);
        $user->delete();
        return redirect()->intended('userList')->with('success', 'Data user berhasil dihapus');
       }
       public function logout(Request $request) {
        Auth::logout();
        Session::forget('role');
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}
