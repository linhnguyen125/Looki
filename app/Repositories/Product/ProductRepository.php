<?php
namespace App\Repositories\Product;

use App\Repositories\BaseRepository;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Product::class;
    }

    public function getAll(){
        return $this->model->paginate(10);
    }

    public function getAllWithoutPaginate(){
        return $this->model->all();
    }

    public function data_tree($data, $parent_id = 0, $level = 0)
    {
        $result = [];
        foreach ($data as $item) {
            if ($item['parent_id'] == $parent_id) {
                $item['level'] = $level;
                $result[] = $item;
                $child = $this->data_tree($data, $item['id'], $level + 1);
                $result = array_merge($result, $child);
            }
        }
        return $result;
    }

    public function getByKeyWord($keyword){
        return $this->model->where([
                ['name', 'like', "%" . $keyword . "%"],
            ])
            ->orWhere([
                ['description', 'like', "%" . $keyword . "%"],
            ])
            ->paginate(10);
    }
}
