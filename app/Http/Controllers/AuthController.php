<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use Session;
use Cookie;

class AuthController extends Controller
{
    
    public function showRegisterForm(){
        $areas = DB::select('select * from area');
        return view('authentication.register',compact('areas'));
    }
    
    public function register(Request $request){
        $this->validation($request);
        $request['password'] = bcrypt($request->password);
        DB::insert('insert into users (name, email, phone_no, role, area_id, address, password) values (?, ?, ?, ?, ?, ?, ?)', [$request->name , $request->email, $request->phone_no, 'service_receiver', $request->area_id, $request->address, $request->password]);
        return redirect('/')->with('status','you are registered successfully\nNow,you can login.');
    }
    
    public function showLoginForm(){
        return view('authentication.login');
    }
    
    public function login(Request $request){
        
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            $results = DB::select('select * from users where email = ?', [$request->email]);
            foreach($results as $user){
                session(['id'=>$user->id ,'name' => $user->name,'email'=> $user->email,'role'=>$user->role,'phone_no'=>$user->phone_no]);
            }
            if($request->has('remember')){
              Cookie::queue(Cookie::make('remember', 'remember', 45000));
            }
           // dd(session()->all());
            return redirect('/home');
        }
        return 'opps some thing error occur';
    }
    
    public function logout () {
        //logout user
        auth()->logout();
        Cookie::queue(Cookie::forget('remember'));
        Session::flush();
        // redirect to homepage
        return redirect('/');
    }
    
    public function validation($request){
        return $request->validate([
        'email' => 'required|email|unique:users|max:255',
        'password' => 'required|confirmed|max:255',
    ]);

    }
}
