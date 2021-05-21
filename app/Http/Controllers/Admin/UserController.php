<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\CreatUserRequest;
use App\Repositories\Admin\AdminRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $adminRepo;

    public function __construct(AdminRepositoryInterface $adminRepo)
    {
        $this->middleware('auth:admin');
        $this->adminRepo = $adminRepo;
    }

    public function index(Request $request)
    {
        if ($request->status == 'bi-chan') {
            $status = '0';
        } elseif ($request->status == 'hoat-dong') {
            $status = '1';
        }
        $keywords = "";
        if($request->status){
            if ($request->keywords) {
                $keywords = htmlspecialchars($request->keywords);
            }
            $admins = $this->adminRepo->getByStatusAndKeyWord($status, $keywords);
        }else{
            if ($request->keywords) {
                $keywords = htmlspecialchars($request->keywords);
            }
            $admins = $this->adminRepo->getByKeyWord($keywords);
        }

        return view('admin.user.index', compact('admins'));
    }

    public function detail($id)
    {
        $admin = $this->adminRepo->find($id);
        return view('admin.user.detail', compact('admin'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(CreatUserRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $admin = $this->adminRepo->create($data);
        if ($admin) {
            return back()->with('success', 'Thêm mới tài khoản hoàn tất, quay lại trang chính để xem thông tin.');
        } else {
            return back()->with('error', 'Xử lý thất bại, xin vui lòng thử lại.');
        }
    }

    public function suspend($id){
        $admin = $this->adminRepo->update($id, ['status' => '0']);
        if($admin){
            return back()->with(['success' => 'Chỉnh sửa trạng thái quản trị viên thành công']);
        }else{
            return back()->with(['error' => 'Chỉnh sửa trạng thái quản trị viên thất bại. Xin vui lòng thử lại sau']);
        }
    }

    public function active($id){
        $admin = $this->adminRepo->update($id, ['status' => '1']);
        if($admin){
            return back()->with(['success' => 'Chỉnh sửa trạng thái quản trị viên thành công']);
        }else{
            return back()->with(['error' => 'Chỉnh sửa trạng thái quản trị viên thất bại. Xin vui lòng thử lại sau']);
        }
    }
}
