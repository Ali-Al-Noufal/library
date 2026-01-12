<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AttendanceController extends Controller
{
    public function checkIn(Request $request)
    {
        $user = User::where('name', $request->name)->first();
        if($user){
                    
        if(Hash::check($request->password,$user->password)){
            
        $today = now()->format('Y:m:d');

        $attendance = Attendance::firstOrCreate(
            [
                'user_id' => $user->id,
                'date'    => $today,
            ],
            [
                'check_in' => now()->format('H:i:s'),
            ]
        );

        if ($attendance->wasRecentlyCreated) {
           
            return back()->with('message' , 'تم تسجيل الدخول بنجاح');
        }

        return back()->with('message' , 'لقد قمت بتسجيل الدخول مسبقاً اليوم');
        }
        return back()->with('message','كلمة السر خاطئة');
        }
        return back()->with('message','لا وجود لهذا المستخدم');
    }

    public function checkOut(Request $request)
    {
        $user = User::where('name', $request->name)->first();
         if($user){
        if(Hash::check($request->password,$user->password)){
        $today = now()->format('Y-m-d');
        

        $attendance = Attendance::where('user_id', $user->id)->first();
            
        if ($attendance->date->format('Y-m-d') ==$today&& !$attendance->check_out) {
            $attendance->update([
            'check_out' =>now()->format('H:i:s')
        ]);
        return back()->with('message' ,'تم تسجيل الخروج بنجاح');
        }

        if ($attendance->check_out) {
            return back()->with('message' , 'لقد قمت بتسجيل الخروج مسبقاً اليوم');
        }}
        return back()->with('message','كلمة السر خاطئة');
                }
        return back()->with('message','لا وجود لهذا المستخدم');
    }
}