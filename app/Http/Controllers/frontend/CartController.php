<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function Cart()
    {
        return view('frontend.cart.index');
    }

    public function addCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        // Lấy số lượng từ request
        $quantity = $request->input('quantity', 1);

        if (isset($cart[$id])) {
            // Nếu sản phẩm đã tồn tại trong giỏ hàng, tăng số lượng lên
            $cart[$id]['quantity'] += $quantity;
        } else {
            // Nếu sản phẩm chưa có trong giỏ hàng, thêm vào giỏ hàng với số lượng được nhập từ form
            $cart[$id] = [
                'name' => $product->name,
                'quantity' => $quantity,
                'price' => $product->price,
                'url_image' => $product->url_image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('shopping.cart')->with('Success', 'Cập nhật thành công');
    }

    public function updateCart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                $cart[$request->id]['quantity'] = $request->quantity;
                session()->put('cart', $cart);
                return response()->json(['success' => 'Cập nhật giỏ hàng thành công']);
            } else {
                return response()->json(['error' => 'Sản phẩm không tồn tại trong giỏ hàng'], 404);
            }
        } else {
            return response()->json(['error' => 'Dữ liệu không hợp lệ'], 400);
        }
    }

    public function deleteProduct(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
                return response()->json(['success' => 'Xóa sản phẩm khỏi giỏ hàng thành công']);
            } else {
                return response()->json(['error' => 'Sản phẩm không tồn tại trong giỏ hàng'], 404);
            }
        } else {
            return response()->json(['error' => 'ID sản phẩm không hợp lệ'], 400);
        }
    }
}
