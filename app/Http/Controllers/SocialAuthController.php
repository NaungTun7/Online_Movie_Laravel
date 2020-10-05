<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use App\Facebook;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class SocialAuthController extends Controller
{
    /**
     * Redirect the user to the facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider(Request $request)
    {
        $rdr = $request->query('rdr');
        session(['redirect_link' => $rdr]);
        return Socialite::driver('facebook')->redirect();
    }
    /**
     * Obtain the user information from facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();
        $url = 'https://graph.facebook.com/v8.0/' . $user->getId() . '/picture?type=normal';
        $response = Http::withToken($user->token)->get($user->getAvatar());
        $file = Storage::disk('public_uploads')->put($user->getId() . '.jpg', $response->body());
        $facebook = Facebook::updateOrCreate(
            ['fb_id' => $user->getId()],
            ['name' => $user->getName(), 'photo' => 'uploads/' . $user->getId() . '.jpg']
        );
        session(['facebook_user' => json_encode($facebook->toArray())]);
        $path = Str::after(session('redirect_link'), 'http://localhost:8000/');
        // $user->token;
        return redirect($path);
    }
}
