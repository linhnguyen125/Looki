<?php
namespace App\Repositories\User;

use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\User::class;
    }

    public function getAll()
    {
        return $this->model->paginate(10);
    }

    public function getByKeyWord($keyword)
    {
        return $this->model->where([
            ['name', 'like', "%" . $keyword . "%"],
        ])
            ->orWhere([
                ['email', 'like', "%" . $keyword . "%"],
            ])
            ->paginate(10);
    }

    public function findByEmail($email)
    {
        return $this->model->where('email', $email)->first();
    }
}
