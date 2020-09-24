<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class RegisterController extends Controller
{
    public function register(Request $request){
            $input = $request->input();
            $email = $input['email'];
            $password = $input['password'];
            $password2 = $input['password_confirmation'];
            $dtbsEmail = DB::select("select * from users where email = '$email'");
            if($password !== $password2){
                echo '<script>alert("Password does not same")</script>';
                return view('auth/register');
            }elseif ($dtbsEmail) {
                echo '<script>alert("Email Already Exist")</script>';
                return view('auth/register');
            }
            $password = bcrypt($password);
            try{
				$user = new User();
                $user->name = $input['name'];
                $user->email = $input['email'];
                $user->password = $password;
                $user->remember_token = $input['_token'];
				$user->save();
				return redirect('')->with('status',"Registered");
			}
			catch(Exception $e){
                echo "<script>alert('$e')</script>";
                return redirect('/register')->with('status', "Register failed");
			}
    }
}
