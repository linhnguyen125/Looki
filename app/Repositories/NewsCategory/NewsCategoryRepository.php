<?php

namespace App\Repositories\NewsCategory;

use App\Repositories\BaseRepository;

class NewsCategoryRepository extends BaseRepository implements NewsCategoryRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\NewsCategory::class;
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

    public function getByCategory($id)
    {
        $cats = $this->model->whereIn('parent_id', [$id])->select('id', 'name', 'slug')->get();
        $result = [];
        foreach ($cats as $cat) {
            $result[$cat->name][$cat->slug] = $this->model->whereIn('parent_id', [$cat->id])->select('id', 'name', 'slug')->get();
        }
        return $result;
    }
}
