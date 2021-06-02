<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Order\OrderRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class OrderController extends Controller
{
    protected $orderRepo;

    public function __construct(OrderRepositoryInterface $orderRepo)
    {
        $this->orderRepo = $orderRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $success_orders = [];
        $fail_orders = [];
        $months = [];
        $rate_of_increase_sales = []; // % tăng trưởng doanh số
        $rate_of_increase_orders = []; // % tăng trưởng số hóa đơn
        $month = Carbon::now()->month;
        for ($i = 1; $i <= $month; $i++) {
            $success = $this->orderRepo->getByMonthAndStatus($i, 'success'); // don hang thanh cong
            array_push($success_orders, $success);
            $fail = $this->orderRepo->getByMonthAndStatus($i, 'fail'); // don hang huy
            array_push($fail_orders, $fail);
        }

        // Số đơn hàng tháng đầu tiên
        $orderFirstMonth = $this->orderRepo->getByMonth(1);
        array_push($rate_of_increase_orders, 100); // % tăng trưởng đơn hàng tháng đầu = 100%
        for ($i = 2; $i <= $month - 1; $i++) {
            $orderThisMon = $this->orderRepo->getByMonth($i); // Số đơn hàng tháng tiếp theo
            array_push($rate_of_increase_orders,
                round((($orderThisMon / $orderFirstMonth) * 100), 2));// % tăng trưởng đơn hàng tháng tiếp theo
        }

        // Doanh số tháng đầu
        $salesFirstMonth = $this->orderRepo->totalSaleByMonth(1);
        array_push($rate_of_increase_sales, 100); // % tăng trưởng doanh số tháng đầu = 100%
        for ($i = 2; $i <= $month - 1; $i++) {
            $salesThisMon = $this->orderRepo->totalSaleByMonth($i); // Doanh số tháng tiếp theo
            array_push($rate_of_increase_sales,
                round((($salesThisMon / $salesFirstMonth) * 100), 2));// % tăng trưởng doanh số tháng tiếp theo
        }

        // array tháng
        for ($i = 1; $i <= $month; $i++) {
            array_push($months, 'Tháng ' . $i);
        }

        $data = [
            'success_orders' => $success_orders,
            'fail_orders' => $fail_orders,
            'months' => $months,
            'rate_of_increase_orders' => $rate_of_increase_orders,
            'rate_of_increase_sales' => $rate_of_increase_sales,
        ];

        return response()->json($data, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
