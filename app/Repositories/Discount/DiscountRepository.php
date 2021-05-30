<?php

namespace App\Repositories\Discount;

use App\Repositories\BaseRepository;

class DiscountRepository extends BaseRepository implements DiscountRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Discount::class;
    }

    public function getWithPaginate($page)
    {
        return $this->model->paginate($page);
    }

    public function getByKeyWord($keyword)
    {
        return $this->model->where([
            ['name', 'like', "%" . $keyword . "%"],
        ])
            ->orWhere([
                ['description', 'like', "%" . $keyword . "%"],
            ])
            ->paginate(10);
    }
}
