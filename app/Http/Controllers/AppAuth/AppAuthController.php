<?php

namespace App\Http\Controllers\AppAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppAuthController extends Controller {

    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $remember = true;
        //dump($request->all());
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
           // return view('new');
           return redirect('new');
           // redirect()->route('new');
        }else{
           // return view('login');

      	//return back()->with('success','Item created successfully!');
          return back()->withErrors(['Item created successfully!']);
           //Session::flash('message', 'This is a message!');
           // return back()->withMessage(['Message' => 'message hirring']);

        }
    }
    public function show_signup_form()
    {
        return view('register_auth');
    }
}
