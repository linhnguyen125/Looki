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

    public function updateStatus($id, $status){
        $result = $this->find($id);
        if ($result) {
            $result->update([
                'status' => $status
            ]);
            return $result;
        }
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

}
