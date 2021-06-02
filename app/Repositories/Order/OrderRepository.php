<?php
namespace App\Repositories\Order;

use App\Repositories\BaseRepository;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Order::class;
    }

    public function updateStatus($id, $status)
    {
        $result = $this->find($id);
        if ($result) {
            $result->update([
                'status' => $status
            ]);
            return $result;
        }
    }

    public function get($num)
    {
        return $this->model->orderBy('price', 'desc')->take($num)->get();
    }

    public function getByStatusAndKeyWord($status, $keyword)
    {
        return $this->model->
        where([
            ['order_code', 'like', "%" . $keyword . "%"],
            ['status', $status]
        ])
            ->orWhere([
                ['user_name', 'like', "%" . $keyword . "%"],
                ['status', $status]
            ])
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }

    public function getByKeyWord($keyword)
    {
        return $this->model->where([
            ['order_code', 'like', "%" . $keyword . "%"],
        ])
            ->orWhere([
                ['user_name', 'like', "%" . $keyword . "%"],
            ])
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }

    public function getByMonthAndStatus($month, $status)
    {
        return $this->model->whereMonth('created_at', $month)->where('status', $status)->count();
    }

    public function getByMonth($month)
    {
        return $this->model->whereMonth('created_at', $month)->count();
    }
}
