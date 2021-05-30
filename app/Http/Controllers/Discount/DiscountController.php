<?php

namespace App\Http\Controllers\Discount;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Discount\DiscountRequest;
use App\Repositories\Discount\DiscountRepositoryInterface;
use Illuminate\Http\Request;

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
        if ($discount) {
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