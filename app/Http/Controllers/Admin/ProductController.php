<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\ProductRequest;
use App\Models\Discount;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    protected $productRepo;
    protected $catRepo;

    public function __construct(ProductRepositoryInterface $productRepo, CategoryRepositoryInterface $catRepo)
    {
        $this->middleware('auth:admin');
        $this->productRepo = $productRepo;
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
            $products = $this->productRepo->getByStatus($status, $keyword);
        } elseif ($request->filter) {
            $filter = $this->filter($request->filter);
            if ($request->keyword) {
                $keyword = htmlspecialchars($request->keyword);
            }
            $products = $this->productRepo->getByFilter($filter, $keyword);
        } elseif ($request->status && $request->filter) {
            $status = $this->status($request->status);
            $filter = $this->filter($request->filter);
            if ($request->keyword) {
                $keyword = htmlspecialchars($request->keyword);
            }
            $products = $this->productRepo->getByStatusAndFilter($status, $filter, $keyword);
        } else {
            if ($request->keyword) {
                $keyword = htmlspecialchars($request->keyword);
            }
            $products = $this->productRepo->getByKeyWord($keyword);
        }

        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = $this->catRepo->getAllWithoutPaginate();
        $division_categories = $this->catRepo->data_tree($categories, 0, 0);
        return view('admin.product.create', compact('division_categories'));
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $product = $this->productRepo->create($data);
        if ($product) {
            return back()->with(['success' => 'T???o m???i s???n ph???m th??nh c??ng, b??y gi???i b???n c?? th??? xem chi ti???t s???n ph???m.']);
        } else {
            return back()->with(['error' => 'T???o m???i s???n ph???m th???t b???i, xin vui l??ng th??? l???i sau.']);
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
        } else {
            return 'price';
        }
    }

    public function edit($id)
    {
        $product = $this->productRepo->find($id);
        $categories = $this->catRepo->getAllWithoutPaginate();
        $division_categories = $this->catRepo->data_tree($categories, 0, 0);
        $discounts = Discount::all();
        return view('admin.product.edit', compact('product', 'division_categories', 'discounts'));
    }

    public function update(ProductRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $product = $this->productRepo->update($id, $data);
        if ($product) {
            return back()->with(['success' => 'ch???nh s???a s???n ph???m th??nh c??ng, b??y gi???i b???n c?? th??? xem chi ti???t s???n ph???m.']);
        } else {
            return back()->with(['error' => 'Ch???nh s???a s???n ph???m th???t b???i, xin vui l??ng th??? l???i sau.']);
        }
    }

    public function delete($id)
    {
        $product = $this->productRepo->delete($id);
        if ($product) {
            return back()->with(['success' => 'S???n ph???m ???? ???????c x??a kh???i h??? th???ng.']);
        } else {
            return back()->with(['error' => 'X??a s???n ph???m th???t b???i, xin vui l??ng th??? l???i sau.']);
        }
    }

    public function updateStock(Request $request, $id)
    {
        $request->validate([
            'stock' => ['required', 'integer']
        ]);
        $product = $this->productRepo->update($id, ['stock' => $request->stock]);
        if ($product) {
            return back()->with(['success' => 'C???p nh???t s??? l?????ng th??nh c??ng.']);
        } else {
            return back()->with(['error' => 'C???p nh???t s??? l?????ng th???t b???i, xin vui l??ng th??? l???i sau.']);
        }
    }

    public function updatePrice(Request $request, $id)
    {
        $request->validate([
            'price' => ['required', 'integer']
        ]);
        $product = $this->productRepo->update($id, ['price' => $request->price]);
        if ($product) {
            return back()->with(['success' => 'C???p nh???t gi?? b??n th??nh c??ng.']);
        } else {
            return back()->with(['error' => 'C???p nh???t gi?? b??n th???t b???i, xin vui l??ng th??? l???i sau.']);
        }
    }
}
