<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    protected $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function redirect($provider_name)
    {
        return Socialite::driver($provider_name)->redirect();
    }

    public function callback($provider_name)
    {
        try {
            $user = Socialite::driver($provider_name)->user();
        } catch (\Exception $e) {
            return redirect()->route('login');
        }

        $existingUser = $this->userRepo->findByProviderId($user->getId());

        if ($existingUser) {
            auth()->login($existingUser, true);
        } else {
            $data = [
                'provider_name' => $provider_name,
                'provider_id' => $user->getId(),
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'avatar' => $user->getAvatar(),
                'password' => bcrypt(Str::random(16)),
            ];
            $newUser = $this->userRepo->create($data);

            auth()->login($newUser, true);
        }

        return redirect('/');
    }
}
