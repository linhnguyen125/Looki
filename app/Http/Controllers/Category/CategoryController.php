<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CategoryRequest;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    protected $catRepo;

    public function __construct(CategoryRepositoryInterface $catRepo)
    {
        $this->middleware('auth:admin');
        $this->catRepo = $catRepo;
    }

    public function index(Request $request){
        $categories = $this->catRepo->getAllWithoutPaginate();
        $division_categories = $this->catRepo->data_tree($categories, 0, 0);
        $keywords = "";
        if ($request->keywords) {
            $keywords = htmlspecialchars($request->keywords);
        }
        $categories = $this->catRepo->getByKeyWord($keywords);
        return view('admin.category.index', compact('division_categories', 'categories'));
    }

    public function store(CategoryRequest $request){
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $data['admin_id'] = (string)Auth::guard('admin')->id();
        $category = $this->catRepo->create($data);
        if($category){
            return back()->with(['success' => 'Tạo danh mục sản phẩm mới thành công, bây giờ bạn có thể xem chi tiết.']);
        }else{
            return back()->with(['error' => 'Tạo danh mục sản phẩm mới thất bại, xin vui lòng thử lại sau.']);
        }
    }

    public function delete($id){
        $category = $this->catRepo->delete($id);
        if($category){
            return back()->with(['success' => 'Xóa danh mục sản phẩm thành công, mọi sản phẩm thuộc đanh mục trên cũng đã bị xóa.']);
        }else{
            return back()->with(['error' => 'Xóa danh mục sản phẩm thất bại, xin vui lòng thử lại sau.']);
        }
    }

    public function edit($id){
        $category = $this->catRepo->find($id);
        $categories = $this->catRepo->getAllWithoutPaginate();
        $division_categories = $this->catRepo->data_tree($categories, 0, 0);
        return view('admin.category.edit', compact('category', 'division_categories'));
    }

    public function update(CategoryRequest $request, $id){
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $data['admin_id'] = (string)Auth::guard('admin')->id();
        $category = $this->catRepo->update($id, $data);
        if($category){
            return back()->with(['success' => 'Chỉnh sửa danh mục sản phẩm thành công, bạn có thể quay trở lại để xem chi tiết']);
        }else{
            return back()->with(['error' => 'Chỉnh sửa danh mục sản phẩm thất bại, xin vui lòng thử lại sau.']);
        }
    }
}
