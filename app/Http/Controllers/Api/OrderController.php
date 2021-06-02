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
        $ratio_success_orders = [];
        $ratio_fail_orders = [];
        $month = Carbon::now()->month;
        $orders = [];
        for ($i = 1; $i <= $month; $i++) {
            $orders = $this->orderRepo->getByMonth($i); // tong don hang
            $success = $this->orderRepo->getByMonthAndStatus($i, 'success'); // don hang thanh cong
            array_push($success_orders, $success);
            array_push($ratio_success_orders, ($success / $orders) * 100); // ti le don thanh cong
        }

        for ($i = 1; $i <= $month; $i++) {
            $orders = $this->orderRepo->getByMonth($i); // tong don hang
            $fail = $this->orderRepo->getByMonthAndStatus($i, 'fail'); // don hang huy
            array_push($fail_orders, $fail);
            array_push($ratio_fail_orders, ($fail / $orders) * 100); // ti le don hang huy
        }
        // array tháng
        for ($i = 1; $i <= $month; $i++) {
            array_push($months, 'Tháng ' . $i);
        }

        $data = [
            'success_orders' => $success_orders,
            'fail_orders' => $fail_orders,
            'months' => $months,
            'ratio_fail_orders' => $ratio_fail_orders,
            'ratio_success_orders' => $ratio_success_orders,
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
