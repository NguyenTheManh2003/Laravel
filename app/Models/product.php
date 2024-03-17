<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function getProducts()
    {
        return Product::paginate(10);
    }
    public function getProductsHomeALL() {
        return Product::limit(8)->get();
    }
 
    public function getOneProduct($id)
    {
        return Product::find($id);
    }

    public function updateSP($product, $id)
    {
        $sp = Product::find($id);
        $sp->code = $product['code'];
        $sp->name = $product['name'];
        $sp->price = $product['price'];
        $sp->description = $product['description'];
        return $sp->save();
    }
    

  // phuong thuc lay san pham cho trang product
  public function getALLProductsPageFrontend()
  {
      //Query Builder
      //$products = DB::table('products')->get();
      //Eloquent ORM
      $products = Product::paginate(8);
      return $products;
  }
  public function get_ByCategoryId1()
  {
      return Product::where('cate_id', 1)->paginate(8);
  }
  public function get_ByCategoryId2()
  {
      return Product::where('cate_id', 2)->paginate(8);
  }
  public function get_ByCategoryId3()
  {
      return Product::where('cate_id', 3)->paginate(8);
  }
  public function get_ByCategoryId4()
  {
      return Product::where('cate_id', 4)->paginate(8);
  }
  public function getProductsByCategoryId($cate_id)
  {
      return Product::where('cate_id', $cate_id)->paginate(8);
  }
  // phuong thuc lay san pham cho trang product


    // lay id de xuat ra chi tiet san pham
    public function getDetails($id)
    {
        return Product::find($id);
    }

    public function addProduct($productData)
    {
        $newProduct = new Product;
        $newProduct->code = $productData['code'];
        $newProduct->name = $productData['name'];
        $newProduct->price = $productData['price'];
        $newProduct->url_image = $productData['url_image'];
        $newProduct->description = $productData['description'];
        $newProduct->category = $productData['category'];
        return $newProduct->save();
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);

        if ($product) {
            return $product->delete();
        }

        return false;
    }
}