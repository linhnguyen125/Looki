<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->middleware('auth:admin');
        $this->userRepo = $userRepo;
    }

    public function index(Request $request){
        $keywords = "";
        if ($request->keywords) {
            $keywords = htmlspecialchars($request->keywords);
        }
        $users = $this->userRepo->getByKeyWord($keywords);
        return view('admin.customer.index', compact('users'));
    }

    public function detail($id)
    {
        $user = $this->userRepo->find($id);
        return view('admin.customer.detail', compact('user'));
    }
}
