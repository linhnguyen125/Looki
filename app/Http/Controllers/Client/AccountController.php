<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateProfileRequest;
use App\Models\District;
use App\Models\Province;
use App\Models\Ward;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();
        $provenceId = Province::where('name', 'like', $user->address['province'] ?? '1')->first();
        $districtId = District::where('name', 'like', $user->address['district'] ?? '1')->first();
        $provinces = Province::all();
        $districts = District::where('province_id', $provenceId->id ?? '1')->get();
        $wards = Ward::where('district_id', $districtId->id ?? '1')->get();
        return view('client.account.index', compact('user', 'provinces', 'districts', 'wards'));
    }

    public function update(UpdateProfileRequest $request)
    {
        $data = $request->all();
        $province = Province::find($request->input('province'))->name;
        $district = District::find($request->input('district'))->name;
        $ward = Ward::find($request->input('ward'))->name;
        $data['address'] = [
            'province' => $province,
            'district' => $district,
            'ward' => $ward,
            'more' => $request->input('more'),
        ];

        $data = Arr::except($data, ['province', 'district', 'ward', 'more']);

        $user = $this->userRepo->update(Auth::user()->id, $data);
        if ($user) {
            return back()->with('success', 'Cảm ơn bạn, bạn đã thay đổi thông tin thành công');
        } else {
            return back()->with('error', 'Có lỗi xảy ra, xin vui lòng thử lại sau');
        }
    }
}
