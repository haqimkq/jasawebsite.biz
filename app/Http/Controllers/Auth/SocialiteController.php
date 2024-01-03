<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleProvideCallback(Request $request)
    {
        try {
            $user = Socialite::driver('google')->user();
            $authUser = $this->findOrCreateUser($user);
        } catch (Exception $e) {
            dd($e);
            // return redirect()->back();
        }
        if (Auth::user()->isSupport == true) {
            return redirect()->route('dashboard');
        } else {
            return redirect(RouteServiceProvider::HOME);
        }
    }

    public function findOrCreateUser($socialUser)
    {
        $socialAccount = User::where('google_id', $socialUser->getId())
            ->first();
        if ($socialAccount) {
            Auth::login($socialAccount);
        } else {
            $user = User::where('email', $socialUser->getEmail())->first();

            if (!$user) {
                $user = User::create([
                    'name'  => $socialUser->getName(),
                    'email' => $socialUser->getEmail(),
                    'password' => bcrypt('password'),
                    'isAdmin' => false,
                ]);
            }
            if ($user->email_verified_at == null) {
                $user->email_verified_at = now()->subDays(rand(1, 30))->subHours(rand(1, 12));
            }
            $user->google_id = $socialUser->getId();
            $user->save();

            Auth::login($user);
        }
    }
}
