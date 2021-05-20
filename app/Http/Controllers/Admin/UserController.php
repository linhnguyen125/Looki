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

    public function index(Request $request){
        $admins = $this->adminRepo->getAll();
        return view('admin.user.index', compact('admins'));
    }

    public function detail($id){
        $admin = $this->adminRepo->find($id);
        return view('admin.user.detail', compact('admin'));
    }

    public function create(){
        return view('admin.user.create');
    }

    public function store(CreatUserRequest $request){
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $admin = $this->adminRepo->create($data);
        if($admin){
            return back()->with('success', 'Thêm mới tài khoản hoàn tất, quay lại trang chính để xem thông tin.');
        }else{
            return back()->with('error', 'Xử lý thất bại, xin vui lòng thử lại.');
        }
    }
}
