<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    //
    public function login(Request $request){
        $input = $request->input();
        $email = $input['email'];
        $password = $input['password'];
        $user = DB::select("select * from users where email = '$email'")[0];
        $error = "Email Or Password Is Wrong";
        if(!$user){
            echo "<script>alert('$error')</script>";
            return view('auth/login');
        }
        $userpassword = password_verify($password, $user->password);
        if(!$userpassword) {
            echo "<script>alert('$error')</script>";
            return view('auth/login');
        }
        return redirect('')->with('status',"Login Success");
    }
}
