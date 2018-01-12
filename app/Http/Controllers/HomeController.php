<?php

namespace App\Http\Controllers;

use App\Model\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function logIn(){
        try{
            $this->data('title',$this->title('Login'));
        }catch (\Exception $e){
            $e->getMessage();
        }finally{
            return view('Admin.Pages.Login.Login',$this->data);
        }
    }

    public function logInAction(Request $request){

        $this->validate($request,[
            'email'=>'required',
            'password'=>'required|min:4'
        ]);

        $email = $request->email;
        $password = $request->password;
        $remember = isset($request->remember)? true :false;

        if (Auth::guard('admin')->attempt(['email'=>$email, 'password'=>$password], $remember)){
            return redirect()->intended('admin');
        } else{
            return redirect()->back()->with('error','Email Or Password is Incorrect');
        }
    }

    public function signUp(){
        try{

            $this->data('title','Sign Up');
        }catch (\Exception $e){
            $e->getMessage();
        } finally{
            return view('Admin.Pages.Signup.Signup',$this->data);
        }
    }

    public function signUpAction(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:4|confirmed',
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;

        $data['password'] = bcrypt($request->password);

        if(Admin::create($data)){
            return redirect()->route('login')->with('success','Sign up successfull');
        } else{
            return redirect()->back();
        }
    }


}
