<?php

namespace App\Repositories\NewsCategory;

interface NewsCategoryRepositoryInterface
{
    public function getAll();

    public function find($id);

    public function delete($id);

    public function create($attributes = []);

    public function update($id, $attributes = []);

    public function data_tree($data, $parent_id = 0, $level = 0);

    public function getByKeyWord($keyword);

    public function findBySlug($slug);
}
