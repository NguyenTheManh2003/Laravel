<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    //tạo view để hiển thị
    public function index()
    {
        $product = new Product();
        return view('backend.product.index', ['products' => $product->getProducts()]);
    }


    public function getAllProduct() {
        return Product::paginate(15);
    }

    public function getOneProduct($id)
    {
        $sp = new Product();
        return view('backend.product.edit', ['sp' => $sp->getOneProduct($id)]);

    }

    public function edit(Request $request)
    {
        $str_id = $request->input('id');
        $str_code = $request->input('code');
        $str_name = $request->input('name');
        $str_price = $request->input('price');
        $str_description = $request->input('description');

        $product = [
            'code' => $str_code,
            "name" => $str_name,
            "price" => $str_price,
            "description" => $str_description
        ];

        $prod = new product();
        if ($prod->updateSP($product, $str_id) == 1) {
            return redirect()->route('admin.product.index')->with("success", "Update thành công!");
        } else {
            return redirect()->route('admin.product.edit', [$str_id])->with("success", "Update thất b!");
        }
    }


    // Hiển thị form thêm sản phẩm
    public function create()
    {
        return view('backend.product.add');

    }


    // Thêm sản phẩm mới
    public function add(Request $request)
    {
        $validatedData = $request->validate([
            'code' => 'required',
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'url_image' => 'required',
            'category' => 'required',
        ]);

        $productData = [
            'code' => $validatedData['code'],
            'name' => $validatedData['name'],
            'price' => $validatedData['price'],
            'description' => $validatedData['description'],
            'url_image' => $validatedData['url_image'],
            'category' => $validatedData['category'],
        ];

        $productModel = new Product();

        if ($productModel->addProduct($productData)) {
            return redirect()->route('admin.product.index')->with("success", "Thêm sản phẩm thành công!");
        } else {
            return redirect()->route('admin.product.create')->with("error", "Thêm sản phẩm thất bại!");
        }
    }

    // Trong ProductController.php
    public function delete($id)
    {
        $productModel = new Product();

        if ($productModel->deleteProduct($id)) {
            return redirect()->route('admin.product.index')->with("success", "Xóa sản phẩm thành công!");
        } else {
            return redirect()->route('admin.product.index')->with("error", "Xóa sản phẩm thất bại!");
        }
    }


}