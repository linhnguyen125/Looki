<?php

namespace App\Repositories\Category;

use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Category::class;
    }

    public function getAll()
    {
        return $this->model->paginate(10);
    }

    public function getAllWithoutPaginate()
    {
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
            $result[$cat->name][$cat->slug] = $this->model->whereIn('parent_id', [$cat->id])->select('id', 'name',
                'slug')->get();
        }
        return $result;
    }

    public function getBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }

    public function getChild($id)
    {
        return $this->model->where('parent_id', $id)->pluck('id');
    }
}
