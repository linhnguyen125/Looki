<?php

namespace App\Http\Controllers\Blog;

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
            return back()->with(['success' => 'Tạo mới blog thành công, bây giời bạn có thể xem chi tiết blog.']);
        } else {
            return back()->with(['error' => 'Tạo mới blog thất bại, xin vui lòng thử lại sau.']);
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
            return back()->with(['success' => 'chỉnh sửa blog thành công, bây giời bạn có thể xem chi tiết blog.']);
        } else {
            return back()->with(['error' => 'Chỉnh sửa blog thất bại, xin vui lòng thử lại sau.']);
        }
    }

    public function delete($id){
        $product = $this->blogRepo->delete($id);
        if ($product) {
            return back()->with(['success' => 'blog đã được xóa khỏi hệ thống.']);
        } else {
            return back()->with(['error' => 'Xóa blog thất bại, xin vui lòng thử lại sau.']);
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
