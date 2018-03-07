<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
class FacebookController extends Controller
{
    public function redirectToFacebookProvider(){
        return Socialite::driver('facebook')->redirect();
    }
    public function handProviderCallback(){
        try{
            $user = Socialite::driver('facebook')->user();
        }catch(Exception $e){
            return redirect('auth/facebook');
        }



        $authUser=$this->findOrCreateUser($user);

        Auth::login($authUser,true);
        return redirect('trangchu');

    }
    private function findOrCreateUser($facebookUser){
        $authUser=User::where('facebook_id',$facebookUser->id)->first();
        if($authUser){
            return $authUser;
        }else{
            $newUser=new User();
            $newUser->name=$facebookUser->name;
            $newUser->email="$facebookUser->name"."$facebookUser->id"."@gmail.com";
            $newUser->facebook_id=$facebookUser->id;
            $newUser -> quyen =0;
            $newUser->save();
            return $newUser;
        }

    }
}
