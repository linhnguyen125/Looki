<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\AdminRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

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

    public function updateAvatar(Request $request, $id){
        $request->validate([
            'avatar' => ['required', 'image'],
        ]);
        if ($request->hasFile('avatar')) {
            $file = $request->avatar;
            $fileName = $file->getClientOriginalName();
            $path = 'upload/images/avatar/' . $fileName;
            $file->move('public/upload/images/avatar', $file->getClientOriginalName());

            $admin = $this->adminRepo->update($id, ['avatar' => $fileName]);
            if($admin){
                return back();
            }else{
                return back()->with(['error' => 'Cập nhật ảnh thất bại. Xin vui lòng thử lại sau']);
            }
        }
    }
}
