<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\NewsRequest;
use App\Repositories\NewsCategory\NewsCategoryRepositoryInterface;
use App\Repositories\News\NewsRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    protected $newsRepo;
    protected $catRepo;

    public function __construct(NewsRepositoryInterface $newsRepo, NewsCategoryRepositoryInterface $catRepo)
    {
        $this->middleware('auth:admin');
        $this->newsRepo = $newsRepo;
        $this->catRepo = $catRepo;
    }

    public function index(Request $request)
    {
        $keyword = " ";
        if ($request->status) {
            $status = $this->status($request->status);
            if ($request->keyword) {
                $keyword = htmlspecialchars($request->keyword);
            }
            $newses = $this->newsRepo->getByStatus($status, $keyword);
        } elseif ($request->filter) {
            $filter = $this->filter($request->filter);
            if ($request->keyword) {
                $keyword = htmlspecialchars($request->keyword);
            }
            $newses = $this->newsRepo->getByFilter($filter, $keyword);
        } elseif ($request->status && $request->filter) {
            $status = $this->status($request->status);
            $filter = $this->filter($request->filter);
            if ($request->keyword) {
                $keyword = htmlspecialchars($request->keyword);
            }
            $newses = $this->newsRepo->getByStatusAndFilter($status, $filter, $keyword);
        } else {
            if ($request->keyword) {
                $keyword = htmlspecialchars($request->keyword);
            }
            $newses = $this->newsRepo->getByKeyWord($keyword);
        }

        return view('admin.news.index', compact('newses'));
    }

    public function create()
    {
        $categories = $this->catRepo->getAll();
        $division_categories = $this->catRepo->data_tree($categories, 0, 0);
        return view('admin.news.create', compact('division_categories'));
    }

    public function store(NewsRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $data['admin_id'] = Auth::guard('admin')->id();
        $product = $this->newsRepo->create($data);
        if ($product) {
            return back()->with(['success' => 'T???o m???i tin t???c th??nh c??ng, b??y gi???i b???n c?? th??? xem chi ti???t tin t???c.']);
        } else {
            return back()->with(['error' => 'T???o m???i tin t???c th???t b???i, xin vui l??ng th??? l???i sau.']);
        }
    }

    public function edit($id){
        $news = $this->newsRepo->find($id);
        $categories = $this->catRepo->getAll();
        $division_categories = $this->catRepo->data_tree($categories, 0, 0);
        return view('admin.news.edit', compact('news', 'division_categories'));
    }

    public function update(NewsRequest $request, $id){
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $data['admin_id'] = Auth::guard('admin')->id();
        $news = $this->newsRepo->update($id, $data);
        if ($news) {
            return back()->with(['success' => 'ch???nh s???a tin t???c th??nh c??ng, b??y gi???i b???n c?? th??? xem chi ti???t tin t???c.']);
        } else {
            return back()->with(['error' => 'Ch???nh s???a tin t???c th???t b???i, xin vui l??ng th??? l???i sau.']);
        }
    }

    public function delete($id){
        $product = $this->newsRepo->delete($id);
        if ($product) {
            return back()->with(['success' => 'tin t???c ???? ???????c x??a kh???i h??? th???ng.']);
        } else {
            return back()->with(['error' => 'X??a tin t???c th???t b???i, xin vui l??ng th??? l???i sau.']);
        }
    }

    protected function status($status)
    {
        if ($status == 'an') {
            return '0';
        } else {
            return '1';
        }
    }

    protected function filter($filter)
    {
        if ($filter == 'view') {
            return 'view';
        }
        return 'view';
    }
}
