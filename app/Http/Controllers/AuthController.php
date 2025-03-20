<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class AuthController extends Controller
{

    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }


    public function handleGithubCallback()
    {
        try {

            $githubUser = Socialite::driver('github')->user();
        } catch (\Exception $e) {

            return redirect('/login')->with('error', 'Errore durante l\'autenticazione con GitHub.');
        }


        $user = User::updateOrCreate(
            ['github_id' => $githubUser->id],
            [
                'name' => $githubUser->name ?? $githubUser->nickname,
                'email' => $githubUser->email,
                'github_token' => $githubUser->token,
                'github_refresh_token' => $githubUser->refreshToken ?? null,
                'password' => bcrypt(uniqid()),
            ]
        );


        if (!$user->github_id) {
            $user = User::updateOrCreate(
                ['email' => $githubUser->email],
                [
                    'name' => $githubUser->name ?? $githubUser->nickname,
                    'github_id' => $githubUser->id,
                    'github_token' => $githubUser->token,
                    'github_refresh_token' => $githubUser->refreshToken ?? null,
                    'password' => bcrypt(uniqid()),
                ]
            );
        }

        Auth::login($user);

        return redirect('/')->with('success', 'Login con GitHub effettuato con successo!');
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}
