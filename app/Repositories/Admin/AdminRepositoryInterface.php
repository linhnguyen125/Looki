<?php
namespace App\Repositories\Admin;

interface AdminRepositoryInterface
{
    public function getAll();
    public function find($id);
    public function delete($id);
    public function create($attributes = []);
    public function update($id, $attributes = []);
    public function lastLogin($id, $date);
    public function getByStatusAndKeyWord($status, $keyword);
    public function getByKeyWord($keyword);
}
