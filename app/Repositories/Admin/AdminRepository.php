<?php
namespace App\Repositories\Admin;

use App\Repositories\BaseRepository;

class AdminRepository extends BaseRepository implements AdminRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Admin::class;
    }

    public function getAll(){
        return $this->model->paginate(10);
    }

    public function lastLogin($id, $date){
        $result = $this->find($id);
        if ($result) {
            $result->update([
                'last_login' => $date,
            ]);
            return $result;
        }
    }

    public function getByStatusAndKeyWord($status, $keyword){
        return $this->model->where([
                ['name', 'like', "%" . $keyword . "%"],
                ['status', $status]
            ])
            ->orWhere([
                ['email', 'like', "%" . $keyword . "%"],
                ['status', $status]
            ])
            ->paginate(10);
    }

    public function getByKeyWord($keyword){
        return $this->model->where([
            ['name', 'like', "%" . $keyword . "%"],
            ])
            ->orWhere([
                ['email', 'like', "%" . $keyword . "%"],
            ])
            ->paginate(10);
    }

}
