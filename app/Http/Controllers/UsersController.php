<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function Login(){
        return view("login");
    }

    public function Register(){
        return view("welcome");
    }

    public function dashboard(Request $request){
        if(Session()->has("LoginId")){
            $user = User::where("id" , "=" , $request->session()->get("LoginId"))->get();
            return view("dashboard" , ["user" => $user]);
        }
    }


    public function RegisterUser(Request $request){

        $request->validate([
            "firstname" => "required",
            "lastname" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|min:6|max:10"
        ]);

        $user = new User();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $insert = $user->save();

        if($insert){
            $msg = "You have register succesfully !!";
            return redirect("login")->with("RegisterMsg",$msg);
        }

    }

    public function LoginUser(Request $request){

        $request->validate([
            "email" => "required|email",
            "password" => "required|min:6|max:10"
        ]);

        $user = User::where("email" , "=" , $request->email)->first();

        if($user){

            if(Hash::check($request->password , $user->password)){
                session()->put("LoginId",$user->id);
                return redirect("dashboard")->with("LoginMsg","Successfully Logged In");
            }else{
                return back()->with("msg" , "Password is not correct");
            }
        }
        else{
            return back()->with("msg" , "User does not exist");
        }
        
    }

    public function logout(){
        $destroy = Session()->pull("LoginId");
        if($destroy){
            return redirect("login",);
        }
        
    }

}
