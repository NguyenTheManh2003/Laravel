<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductFrontendController extends Controller
{
    //
    public function productHome(){
        $productModel = new Product();
        $productHome = $productModel->getProductsHomeALL(); // Assigning data to $productHome
        return view('frontend.home.index', compact('productHome')); // Compacting $productHome
    }
    public function getProductsByCategory($cate_id = null)
    {
        $product_data = new Product();
        $products = ($cate_id) ? $product_data->getProductsByCategoryId($cate_id) : $product_data->getALLProductsPageFrontend();

        if (request()->ajax()) {
            return response()->json(view('frontend.productFrontend.productFrontendPage', compact('products'))->render());
        }

        return view('frontend.products.index', compact('products', 'cate_id'));
    }
public function showDetails($id)
    {
        $productModel = new Product();
        $product = $productModel->getDetails($id);
        return view('frontend.products_detail.index', compact('product'));
    }
    
}
