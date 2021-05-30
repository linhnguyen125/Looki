<?php

namespace App\Repositories\Discount;

interface DiscountRepositoryInterface
{
    public function getAll();

    public function find($id);

    public function delete($id);

    public function create($attributes = []);

    public function update($id, $attributes = []);

    public function getWithPaginate($page);

    public function getByKeyWord($keyword);
}
