<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\OrderDetail\OrderDetailRepositoryInterface;
use Illuminate\Http\Request;

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
        return view('admin.dashboard.index');
    }
}
