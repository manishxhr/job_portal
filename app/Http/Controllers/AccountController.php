<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;


class AccountController extends Controller
{
    public function register(){
        return view('frontend.register');
    }
    public function userRegister(Request $request){
        $data=$request->validate([
            'name'=>'required', 
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $user= User::create($data);
        Auth::login($user);
        return redirect(route('account'));

    }


    public function login(){
        return view('frontend.login');
    }


    public function userLogin(Request $request){
        $data=$request->validate([
            'email'=>'email|required',
            'password'=>'required'
        ]);

       $user= Auth::attempt($data);
       if($user){
        return redirect(route('account'))->with('success','login successfull');
       }
       return back()->with('error','login failed');

    
    }

    public function profile(){
        $user= Auth::user();
        return view('frontend.account',compact('user'));
    }

    public function updateProfile(Request $request){
        $id= Auth::user()->id;
        $data= $request->validate([
            'name'=>'required',
            // 'email'=>'required|email',
            'designation'=>'nullable',
            'mobile'=>'nullable|numeric|digits:10'
        ]);
        $user=User::findOrFail($id);
        if($user->update($data)){
            return redirect(route('account'));
        }
        

    }

}
