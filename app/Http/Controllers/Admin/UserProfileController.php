<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\AvatarRequest;
use App\Http\Requests\Admin\User\UpdateProfileRequest;
use App\Models\District;
use App\Models\Province;
use App\Models\Ward;
use App\Repositories\Admin\AdminRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;

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

        $provenceId = Province::where('name', 'like', $admin->address['province'] ?? '1')->first();
        $districtId = District::where('name', 'like', $admin->address['district'] ?? '1')->first();
        $provinces = Province::all();
        $districts = District::where('province_id', $provenceId->id ?? '1')->get();
        $wards = Ward::where('district_id', $districtId->id ?? '1')->get();

        $this->setActive('info');
        return view('admin.user.user_profile.personal_infomation',
            compact('admin', 'provinces', 'districts', 'wards'));
    }

    public function updateAvatar(AvatarRequest $request, $id)
    {

        if ($request->hasFile('avatar')) {
            $file = $request->avatar;
            $this->clear($id);
            $admin = $this->upload($id, $file);

            if ($admin) {
                return back();
            } else {
                return back()->with(['error' => 'Cập nhật ảnh thất bại. Xin vui lòng thử lại sau']);
            }
        }
    }

    protected function upload($id, $file)
    {
        $fileName = $file->getClientOriginalName();
        $path = 'upload/images/avatar/' . $fileName;
        $file->move('public/upload/images/avatar', $file->getClientOriginalName());
        return $this->adminRepo->update($id, ['avatar' => $path]);
    }

    // xóa ảnh cũ
    protected function clear($id){
        $admin = $this->adminRepo->find($id);
        $avatar = 'public/' . $admin->avatar;
        if(File::exists($avatar)) {
            File::delete($avatar);
        }
    }

    public function updateProfile(UpdateProfileRequest $request, $id)
    {
        $data = $request->all();
        $province = Province::find($request->province)->name;
        $district = District::find($request->district)->name;
        $ward = Ward::find($request->ward)->name;
        $data['address'] = [
            'province' => $province,
            'district' => $district,
            'ward' => $ward,
            'more' => $request->more,
        ];
        $data =  Arr::except($data, ['province', 'district', 'ward', 'more']);
        $admin = $this->adminRepo->update($id, $data);
        if($admin){
            return back()->with(['success' => 'Cập nhật thông tin thành công, giờ bạn có thể xem lại thông tin của mình']);
        }else{
            return back()->with(['error' => 'Cập nhật thông tin thất bại. Xin vui lòng thử lại sau']);
        }
    }

    public function notifies(){
        $this->setActive('notifies');
        return view('admin.user.user_profile.notification');
    }

    protected function setActive($model){
        return session(['model' => $model]);
    }

    public function accountActivity(){
        $this->setActive('activity');
        return view('admin.user.user_profile.account_activity');
    }

    public function securitySetting(){
        $this->setActive('security');
        return view('admin.user.user_profile.security_setting');
    }
}
