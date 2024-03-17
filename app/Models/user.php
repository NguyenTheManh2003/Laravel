<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;



class user extends Model
{
    use HasFactory;

    // public function getUser($email , $pass) {
    //     $user = DB::table('users')
    //             ->select('*')
    //             ->where('email', $email)
    //             ->where('pass', $pass)
    //             ->first();

    //     return $user;
    // }
    public function getProducts()
    {
        //Query Builder
        // $products = DB::table('products')->get();
        //Eloquent ORM
        $products = Product::all();
        return $products;
    }

    public function getOneProduct($id)
    {
        return Product::find($id);
    }


    //Cập nhật sản phẩm
    public function updateSP($product, $id)
    {
        //Query builder
        //$editSP = DB::table('products')->where('id',$id)->update($product);
        //Eloquent ORM
        $sp = Product::find($id);
        $sp->code = $product['code'];
        $sp->name = $product['name'];
        $sp->price = $product['price'];
        $sp->description = $product['description'];
        return $sp->save();
    }

    
    // Thêm sản phẩm mới
    public function addProduct($productData)
    {
        // Eloquent ORM
        $newProduct = new Product;
        $newProduct->code = $productData['code'];
        $newProduct->name = $productData['name'];
        $newProduct->price = $productData['price'];
        $newProduct->image = $productData['image'];
        $newProduct->description = $productData['description'];

        return $newProduct->save();
    }
}