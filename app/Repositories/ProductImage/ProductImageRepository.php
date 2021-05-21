<?php
namespace App\Repositories\ProductImage;

use App\Repositories\BaseRepository;

class ProductImageRepository extends BaseRepository implements ProductImageRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\ProductImage::class;
    }

    public function getAll(){
        return $this->model->paginate(10);
    }
}
