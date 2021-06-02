<?php
namespace App\Repositories\Order;

interface OrderRepositoryInterface
{
    public function getAll();

    public function find($id);

    public function delete($id);

    public function create($attributes = []);

    public function update($id, $attributes = []);

    public function updateStatus($id, $status);

    public function get($num);

    public function getByStatusAndKeyWord($status, $keyword);

    public function getByKeyWord($keyword);

    public function getByMonthAndStatus($month, $status);

    public function getByMonth($month);
}
