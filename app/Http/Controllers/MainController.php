<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class MainController extends Controller
{
    function login(){
        return view('auth.login');
    }

    function register(){
        return view('auth.register');
    }

    function save(Request $request){
//        return $request->input();
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:6|max:12|unique:admins',
        ]);

        $admin = new Admin();

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $save = $admin->save();
        if ($save){
            return back()->with('success','successfull');
        }
        else{
            return back()->with('fail','try again');
        }
    }

    function check(Request $request){
//        return $request->input();
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6|max:12',
        ]);
        $userInfo = Admin::where('email', '=', $request->email)->first();
        if(!$userInfo){
            return back()->with('fail', 'you are not registered');
        }
        else{
            if (Hash::check($request->password, $userInfo->password)){
                $request->session()->put('LogedUser', $userInfo->id);
                return redirect('admin/dashboard');
            }
            else{
                return back()->with('fail', 'your password is wrong');
            }
        }
    }

    function dashboard(){
        $data = Admin::where('id', '=', 1)->first();
        return View('admin.dashboard', compact('data'));
    }

    function logout(){
        if (session()->has('LogedUser')){
            session()->pull('LogedUser');
            return redirect("/auth/login");
        }
    }
}
