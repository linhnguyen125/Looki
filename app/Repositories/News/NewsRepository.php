<?php

namespace App\Repositories\News;

use App\Repositories\BaseRepository;

class NewsRepository extends BaseRepository implements NewsRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\News::class;
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
        ])->paginate(10);
    }

    public function getByStatus($status, $keyword)
    {
        return $this->model->where([
            ['name', 'like', "%" . $keyword . "%"],
            ['status', $status],
        ])->paginate(10);
    }

    public function getByFilter($filter, $keyword)
    {
        return $this->model->where([
            ['name', 'like', "%" . $keyword . "%"],
        ])->orderBy($filter, 'desc')->paginate(10);
    }

    public function getByStatusAndFilter($status, $filter, $keyword)
    {
        return $this->model->where([
            ['name', 'like', "%" . $keyword . "%"],
            ['status', $status],
        ])->orderBy($filter, 'desc')->paginate(10);
    }

    public function getNewNews($num)
    {
        return $this->model->orderBy('created_at', 'desc')->take($num)->get();
    }

    public function getByCategory($id, $page)
    {
        return $this->model->where('news_category_id', $id)->paginate($page);
    }
}
