<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/');
        }else{
            session()->put('fail', "Email or Password is incorrect");
            return redirect('/login');
        }
    }

    public function register(Request $request)
    {
        $uservalid = Validator::make($request->all(), [
            'name' => 'string|required|max:100',
            'email' => 'email|required|unique:users',
            'password' => 'string|required|min:6',
            'confirmpassword' => 'required_with:password|same:password'
        ]);
        if ($uservalid->fails()) {
            return Redirect::back()->withErrors($uservalid);
        } else {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->type = "vendor";
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect('/login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function home()
    {
        if(Auth::check()){
            if(Auth::user()->type === "admin"){
                return redirect("/product");
            }
            else{
                return redirect("/vendor");
            }
        }
        else{
            return redirect("/login");
        }
    }

}
