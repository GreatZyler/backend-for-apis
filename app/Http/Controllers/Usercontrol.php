<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class Usercontrol extends Controller
{
    function login(Request $request){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

      
           $user = User::where('email','=', $request['email'])->get();
      // return var_dump(count($user));
        if (count($user)===0) {
            return response()->json([
                'message' => 'Email or password is incorrect!'
            ], 401);
        }else{
           
            $token = Str::random(32,$characters);

            return response()->json(['token' => $token], 200);
        }
    }

    function all(){
        $users=User::get();
        return $users;
    }

    function edit(Request $request){
        $user = User::where('id','=', $request['id'])->get();
        return $user;
    }
    function up(Request $request){
        $user=User::find($request->id);
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email
        ]);
        return response()->json([
            'message' => 'User Updated'
        ]);
    }
    function del(Request $request)  {
        $user=User::destroy($request->id);
        return response()->json([
            'message' => 'User Deleted'
        ]);
    }
}
