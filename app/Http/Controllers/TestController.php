<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\registered_user;
use Illuminate\Support\Facades\Hash;

class TestController extends Controller
{
    public function loginPage(Request $request)
    {
        $user_records=registered_user::all();
        foreach($user_records as $user_record)
        {
           if($user_record->username==$request->username)
           {
            $hashedPassword=$user_record->password;
            if(Hash::check($request->password, $hashedPassword))
            {
                return view('login_succ');
            }
            else{
                return redirect()->route('welcome')->with('incorrect_credential','11111111111');
            }
           } 
           else{
            return redirect()->route('welcome')->with('incorrect_credential','11111111111');
           }
        }
    }
}
