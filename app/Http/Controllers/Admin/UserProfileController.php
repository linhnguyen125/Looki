<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\AdminRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class UserProfileController extends Controller
{
    protected $adminRepo;

    public function __construct(AdminRepositoryInterface $adminRepo)
    {
        $this->middleware('auth:admin');
        $this->adminRepo = $adminRepo;
    }

    public function info(Request $request, $id)
    {
        $admin = $this->adminRepo->find($id);
        return view('admin.user.user_profile.personal_infomation', compact('admin'));
    }
}
