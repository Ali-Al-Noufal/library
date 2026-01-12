<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function Showlogin(){
        return view('login');
    }
    public function login(Request $request){
        $user=User::where('email',$request->email)->first();
        
        if($user && Hash::check($request->password,$user->password)){
            
           if ($user->role === 'admin') {
            $user = Auth::login($user);
            return redirect()->route('dashboard');
        }
        }
        return back()->with('message','كلمة سر خطئة أو ليس لديك صلاحيات');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('welcome');
    }
}
