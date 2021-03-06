<?php
namespace App\Repositories\User;

interface UserRepositoryInterface
{
    public function getAll();

    public function find($id);

    public function delete($id);

    public function update($id, $attributes = []);

    public function create($attributes = []);

    public function getByKeyWord($keyword);

    public function findByProviderId($providerId);
}
