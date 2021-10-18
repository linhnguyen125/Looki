<?php

namespace App\Http\Controllers\Admin;

use App\Events\SendNotifyEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Discount\DiscountRequest;
use App\Models\Admin;
use App\Notifications\SendMessageNotification;
use App\Repositories\Discount\DiscountRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscountController extends Controller
{
    protected $discountRepo;

    public function __construct(DiscountRepositoryInterface $discountRepo)
    {
        $this->discountRepo = $discountRepo;
    }

    public function index(Request $request)
    {
        $discounts = $this->discountRepo->getWithPaginate(10);
        return view('admin.discount.index', compact('discounts'));
    }

    public function store(DiscountRequest $request)
    {
        $data = $request->all();
        $discount = $this->discountRepo->create($data);
        $users = Admin::all();
        if ($discount) {
            $notify = [
                'user' => Auth::guard('admin')->user()->name,
                'title' => 'Đã tạo thêm 1 khuyến mại mới',
                'content' => $discount->name,
                'link' => route('admin.discount.index')
            ];
            foreach ($users as $user) {
                $user->notify(new SendMessageNotification($notify));
            }
            event(new SendNotifyEvent($notify));
            return back()->with('success', 'Thêm khuyến mãi thành công');
        } else {
            return back()->with('error', 'Thêm khuyến mãi thất bại, vui lòng thử lại sau');
        }
    }

    public function edit($id)
    {
        $discount = $this->discountRepo->find($id);
        return view('admin.discount.edit', compact('discount'));
    }

    public function update(DiscountRequest $request, $id)
    {
        $data = $request->all();
        $discount = $this->discountRepo->update($id, $data);
        if ($discount) {
            return back()->with('success', 'Cập nhật khuyến mãi thành công');
        } else {
            return back()->with('error', 'Cập nhật khuyến mãi thất bại, vui lòng thử lại sau');
        }
    }

    public function delete($id)
    {
        $discount = $this->discountRepo->delete($id);
        if ($discount) {
            return back()->with('success', 'Xóa khuyến mãi thành công');
        } else {
            return back()->with('error', 'Xóa khuyến mãi thất bại, vui lòng thử lại sau');
        }
    }
}
