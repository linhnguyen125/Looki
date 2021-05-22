<?php

namespace App\Http\Controllers\ProductImage;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\ProductImgRequest;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\ProductImage\ProductImageRepositoryInterface;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    protected $prdImgRepo;
    protected $productRepo;

    public function __construct(ProductImageRepositoryInterface $prdImgRepo, ProductRepositoryInterface $productRepo)
    {
        $this->middleware('auth:admin');
        $this->prdImgRepo = $prdImgRepo;
        $this->productRepo = $productRepo;
    }

    public function create($id){
        $product = $this->productRepo->find($id);
        $images = $product->images()->paginate(10);
        return view('admin.product_image.create', compact('product', 'images'));
    }

    public function store(ProductImgRequest $request, $id){
        $data = $request->all();
        $data['product_id'] = $id;
        $prdImg = $this->prdImgRepo->create($data);
        if ($prdImg) {
            return back()->with(['success' => 'Thêm ảnh mới thành công, bây giời bạn có thể xem chi tiết sản phẩm.']);
        } else {
            return back()->with(['error' => 'Thêm ảnh mới thất bại, xin vui lòng thử lại sau.']);
        }
    }

    public function delete($id){
        $prdImg = $this->prdImgRepo->delete($id);
        if ($prdImg) {
            return back()->with(['success' => 'Xóa ảnh thành công, bây giời bạn có thể xem chi tiết sản phẩm.']);
        } else {
            return back()->with(['error' => 'Xóa ảnh thất bại, xin vui lòng thử lại sau.']);
        }
    }
}
