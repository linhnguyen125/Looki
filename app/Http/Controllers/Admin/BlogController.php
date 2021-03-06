<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\BlogRequest;
use App\Repositories\Blog\BlogRepositoryInterface;
use App\Repositories\BlogCategory\BlogCategoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    protected $blogRepo;
    protected $catRepo;

    public function __construct(BlogRepositoryInterface $blogRepo, BlogCategoryRepositoryInterface $catRepo)
    {
        $this->middleware('auth:admin');
        $this->blogRepo = $blogRepo;
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
            $blogs = $this->blogRepo->getByStatus($status, $keyword);
        } elseif ($request->filter) {
            $filter = $this->filter($request->filter);
            if ($request->keyword) {
                $keyword = htmlspecialchars($request->keyword);
            }
            $blogs = $this->blogRepo->getByFilter($filter, $keyword);
        } elseif ($request->status && $request->filter) {
            $status = $this->status($request->status);
            $filter = $this->filter($request->filter);
            if ($request->keyword) {
                $keyword = htmlspecialchars($request->keyword);
            }
            $blogs = $this->blogRepo->getByStatusAndFilter($status, $filter, $keyword);
        } else {
            if ($request->keyword) {
                $keyword = htmlspecialchars($request->keyword);
            }
            $blogs = $this->blogRepo->getByKeyWord($keyword);
        }

        return view('admin.blog.index', compact('blogs'));
    }

    public function create()
    {
        $categories = $this->catRepo->getAll();
        $division_categories = $this->catRepo->data_tree($categories, 0, 0);
        return view('admin.blog.create', compact('division_categories'));
    }

    public function store(BlogRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $data['admin_id'] = Auth::guard('admin')->id();
        $product = $this->blogRepo->create($data);
        if ($product) {
            return back()->with(['success' => 'T???o m???i blog th??nh c??ng, b??y gi???i b???n c?? th??? xem chi ti???t blog.']);
        } else {
            return back()->with(['error' => 'T???o m???i blog th???t b???i, xin vui l??ng th??? l???i sau.']);
        }
    }

    public function edit($id){
        $blog = $this->blogRepo->find($id);
        $categories = $this->catRepo->getAll();
        $division_categories = $this->catRepo->data_tree($categories, 0, 0);
        return view('admin.blog.edit', compact('blog', 'division_categories'));
    }

    public function update(BlogRequest $request, $id){
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $data['admin_id'] = Auth::guard('admin')->id();
        $blog = $this->blogRepo->update($id, $data);
        if ($blog) {
            return back()->with(['success' => 'ch???nh s???a blog th??nh c??ng, b??y gi???i b???n c?? th??? xem chi ti???t blog.']);
        } else {
            return back()->with(['error' => 'Ch???nh s???a blog th???t b???i, xin vui l??ng th??? l???i sau.']);
        }
    }

    public function delete($id){
        $product = $this->blogRepo->delete($id);
        if ($product) {
            return back()->with(['success' => 'blog ???? ???????c x??a kh???i h??? th???ng.']);
        } else {
            return back()->with(['error' => 'X??a blog th???t b???i, xin vui l??ng th??? l???i sau.']);
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
