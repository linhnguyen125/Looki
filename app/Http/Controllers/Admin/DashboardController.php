<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\OrderDetail\OrderDetailRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    protected $orderRepo, $orderDetail;

    public function __construct(OrderRepositoryInterface $orderRepo, OrderDetailRepositoryInterface $orderDetail)
    {
        $this->middleware('auth:admin');
        $this->orderRepo = $orderRepo;
        $this->orderDetail = $orderDetail;
    }

    public function index()
    {
        $month = Carbon::now()->month;
        $totalSales = $this->orderRepo->totalSale(); // tổng doanh số
        $totalSaleThisMonth = $this->orderRepo->totalSaleByMonth($month); // doanh số tháng này
        $totalSaleLastMonth = $this->orderRepo->totalSaleByMonth($month - 1); // doanh số tháng trước
        $avgThisMonth = $this->orderRepo->averageByMonth($month); // trung bình tháng này
        $avgLastMonth = $this->orderRepo->averageByMonth($month - 1); // trung bình tháng trước
        if($avgLastMonth == 0) $avgLastMonth = 1;
        $rate_of_increase_sales = ($avgThisMonth - $avgLastMonth) / $avgLastMonth * 100; // % tăng trưởng doanh số
        $avgOrder = ceil($this->orderRepo->getAll()->count() / $month); // đơn hàng tb tháng

        $now = Carbon::now();
        $ordersThisMonth = $this->orderRepo->totalOrderByDay($now)->count(); // đơn hàng tháng này đến hiện tại
        $lastMonth = $now->subDays(30);
        $ordersLastMonth = $this->orderRepo->totalOrderByDay($lastMonth)->count(); // đơn hàng tháng trước cùng thời điểm
        $rate_of_increase_order = ($ordersThisMonth - $ordersLastMonth) / $ordersLastMonth * 100; // % tăng trưởng đơn hàng
        return view('admin.dashboard.index',
            compact('totalSales', 'totalSaleThisMonth', 'totalSaleLastMonth', 'rate_of_increase_sales', 'avgOrder',
                'rate_of_increase_order'));
    }
}
