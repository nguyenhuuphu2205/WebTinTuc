<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
class GoogleController extends Controller
{
    public function redirectToGoogleProvider(){
        return Socialite::driver('google')->redirect();
    }
    public function handProviderCallback(){
        try{
            $user = Socialite::driver('google')->user();
        }catch(Exception $e){
            return redirect('auth/google');
        }


        $authUser=$this->findOrCreateUser($user);

        Auth::login($authUser,true);
        return redirect('trangchu');

    }
    private function findOrCreateUser($googleUser){
        $authUser=User::where('google_id',$googleUser->id)->first();
        if($authUser){
            return $authUser;
        }else{
            $newUser=new User();
            $newUser->name=$googleUser->name;
            $newUser->email=$googleUser->email;
            $newUser->google_id=$googleUser->id;
            $newUser -> quyen =0;
            $newUser->save();
            return $newUser;
        }

    }
}
