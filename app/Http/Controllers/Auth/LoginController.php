<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Repositories\UserRepository;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loginVK() {

        if (Auth::check()) {

            return redirect()->route('index');
        }

        return Socialite::driver('vkontakte')->redirect();
    }

    public function responseVK(UserRepository $userRepository) {

        if (!Auth::check()) {
            $user = Socialite::driver('vkontakte')->user();


            $userInSysem = $userRepository->getUserBySocId($user, 'vk');

            Auth::login($userInSysem);

        }
        return redirect()->route('index');

    }
}
