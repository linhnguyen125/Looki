<?php

namespace App\Repositories\Product;

interface ProductRepositoryInterface
{
    public function getAll();

    public function find($id);

    public function delete($id);

    public function create($attributes = []);

    public function update($id, $attributes = []);

    public function getAllWithoutPaginate();

    public function data_tree($data, $parent_id = 0, $level = 0);

    public function getByKeyWord($keyword);

    public function getByStatus($status, $keyword);

    public function getByFilter($filter, $keyword);

    public function getByStatusAndFilter($status, $filter, $keyword);

    public function getPopularProduct($num);

    public function getNewProduct($num);

    public function getSaleProduct($num);

    public function getComingUpProduct($num);

    public function getFeaturedProduct($num);
}
