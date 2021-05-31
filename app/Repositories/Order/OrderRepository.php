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

    public function updateStatus($id, $status){
        $result = $this->find($id);
        if ($result) {
            $result->update([
                'status' => $status
            ]);
            return $result;
        }
    }

    public function get($num){
        return $this->model->orderBy('price', 'desc')->take($num)->get();
    }

    public function getAllByStatus($status){
        return $this->model->where('status', $status)->paginate(10);
    }

    public function getAllByKeyword($keyword){
        return $this->model->where('order_code', 'like', '%'.$keyword.'%')->paginate(10);
    }
}
