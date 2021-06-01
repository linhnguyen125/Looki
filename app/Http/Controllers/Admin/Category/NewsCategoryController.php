<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CategoryRequest;
use App\Repositories\NewsCategory\NewsCategoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsCategoryController extends Controller
{
    protected $catRepo;

    public function __construct(NewsCategoryRepositoryInterface $catRepo)
    {
        $this->middleware('auth:admin');
        $this->catRepo = $catRepo;
    }

    public function index(Request $request){
        $categories = $this->catRepo->getAll();
        $division_categories = $this->catRepo->data_tree($categories, 0, 0);
        $keywords = " ";
        if ($request->keywords) {
            $keywords = htmlspecialchars($request->keywords);
        }
        $categories = $this->catRepo->getByKeyWord($keywords);
        return view('admin.category_news.index', compact('division_categories', 'categories'));
    }

    public function store(CategoryRequest $request){
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $category = $this->catRepo->create($data);
        if($category){
            return back()->with(['success' => 'Tạo danh mục tin tức mới thành công, bây giờ bạn có thể xem chi tiết.']);
        }else{
            return back()->with(['error' => 'Tạo danh mục tin tức mới thất bại, xin vui lòng thử lại sau.']);
        }
    }

    public function delete($id){
        $category = $this->catRepo->delete($id);
        if($category){
            return back()->with(['success' => 'Xóa danh mục tin tức thành công, mọi tin tức thuộc đanh mục trên cũng đã bị xóa.']);
        }else{
            return back()->with(['error' => 'Xóa danh mục tin tức thất bại, xin vui lòng thử lại sau.']);
        }
    }

    public function edit($id){
        $category = $this->catRepo->find($id);
        $categories = $this->catRepo->getAll();
        $division_categories = $this->catRepo->data_tree($categories, 0, 0);
        return view('admin.category_news.edit', compact('category', 'division_categories'));
    }

    public function update(CategoryRequest $request, $id){
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $category = $this->catRepo->update($id, $data);
        if($category){
            return back()->with(['success' => 'Chỉnh sửa danh mục tin tức thành công, bạn có thể quay trở lại để xem chi tiết']);
        }else{
            return back()->with(['error' => 'Chỉnh sửa danh mục tin tức thất bại, xin vui lòng thử lại sau.']);
        }
    }
}
