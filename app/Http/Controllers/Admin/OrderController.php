<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\OrderDetail\OrderDetailRepositoryInterface;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderRepo, $orderDetail;

    public function __construct(OrderRepositoryInterface $orderRepo, OrderDetailRepositoryInterface $orderDetail)
    {
        $this->orderRepo = $orderRepo;
        $this->orderDetail = $orderDetail;
    }

    public function index(Request $request)
    {
        $keywords = "";
        if ($request->status) {
            $status = $this->setStatus($request->status);
            if ($request->keywords) {
                $keywords = htmlspecialchars($request->keywords);
            }
            $orders = $this->orderRepo->getByStatusAndKeyWord($status, $keywords);
        } else {
            if ($request->keywords) {
                $keywords = htmlspecialchars($request->keywords);
            }
            $orders = $this->orderRepo->getByKeyWord($keywords);
        }
        return view('admin.order.index', compact('orders'));
    }

    protected function setStatus($status)
    {
        if ($status === 'hoan-thanh') {
            return 'success';
        } elseif ($status === 'dang-giao') {
            return 'in transit';
        } elseif ($status === 'dang-xu-ly') {
            return 'processing';
        } else {
            return 'fail';
        }
    }

    public function delete($id)
    {
        $order = $this->orderRepo->delete($id);
        if ($order) {
            return back()->with('success', 'Xóa hóa đơn thành công');
        } else {
            return back()->with('success', 'Xóa thất bại! Vui lòng thử lại sau');
        }
    }

    public function detail($id)
    {
        $order = $this->orderRepo->find($id);
        $details = $order->details;
        return view('admin.order.detail', compact('order', 'details'));
    }

    public function changeStatus(Request $request)
    {
        $status = $request->status;
        $orderId = $request->orderId;
        $order = $this->orderRepo->updateStatus($orderId, $status);
        if ($order) {
            return "Thay đổi hoàn tất";
        } else {
            return "Thay đổi thất bại";
        }
    }
}
