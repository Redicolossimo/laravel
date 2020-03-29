<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use \SocialiteProviders\Manager\OAuth2\User as UserOAuth;
use Laravel\Socialite\Facades\Socialite;


class LoginController extends Controller
{

    public function loginProvider($provider)
    {
        session()->get('soc.token');
        if (Auth::check()) {
            return redirect()->route('home');
        }
        //dump($provider);
        return Socialite::with($provider)->redirect();
    }

    public function responseProvider(UserRepository $userRepository, $provider)
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        $user = Socialite::driver($provider)->user();
        //Тут мы сделаем проверку нужно переразобрать юзера вв зависимости от инстансса пока не решена проблема
        if ($provider == 'facebook') {
            $token = $user->token;
            $user = Socialite::driver($provider)->userFromToken($token);
        }
        session(['soc.token' => $user->token]);

        $userInSystem = $userRepository->getUserBySocId($user, $provider);

        Auth::login($userInSystem);
        return redirect()->route('home');
    }
    // сделал универсалььные логин методы
//    public function responseFB(UserRepository $userRepository) {
//        if (Auth::id()) {
//            return redirect()->route('home');
//        }
//        $user = Socialite::driver('facebook')->user();
//        $token = $user->token;
//        $user = Socialite::driver('facebook')->userFromToken($token);
//        //dd($user);
//        session(['soc.token' => $user->token]);
//
//        $userInSystem = $userRepository->getUserBySocId(  $user, 'facebook');
//
//        Auth::login($userInSystem);
//        return redirect()->route('home');
//    }
//
//    public function loginVK() {
//        session()->get('soc.token');
//        if (Auth::id()) {
//            return redirect()->route('home');
//        }
//        return Socialite::with('vkontakte')->redirect();
//    }
//
//    public function responseVK(UserRepository $userRepository) {
//        if (Auth::id()) {
//            return redirect()->route('home');
//        }
//        $user = Socialite::driver('vkontakte')->user();
//        //dd($user);
//        //$token = $user->token;
//        //$user = Socialite::driver('vkontakte')->userFromToken($token);
//        session(['soc.token' => $user->token]);
//
//        $userInSystem = $userRepository->getUserBySocId( $user, 'vkontakte');
//
//
//        Auth::login($userInSystem);
//        return redirect()->route('home');
//    }
//
//    public function loginFB() {
//        session()->get('soc.token');
//        if (Auth::id()) {
//            return redirect()->route('home');
//        }
//        return Socialite::with('facebook')->redirect();
//    }

}
