<?php
namespace App\Repositories\Category;

interface CategoryRepositoryInterface
{
    public function getAll();
    public function find($id);
    public function delete($id);
    public function create($attributes = []);
    public function update($id, $attributes = []);
}