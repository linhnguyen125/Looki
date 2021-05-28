<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    protected $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
        $this->middleware(function ($request, $next) {
            session(['module' => 'account']);
            return $next($request);
        });
    }

    public function index()
    {
        return view('client.account.index');
    }
}
