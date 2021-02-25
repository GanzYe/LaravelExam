<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
class CartController extends Controller
{
    public function addToCart(Product $product){
        $item = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'description' => $product->description,
            'quantity' => 4,
            'attributes' => array(),
            'associatedModel' => $product
        ];
        \Cart::session(auth()->id())->add($item);
        return back();
    }

    public function index(){

        $cartItems = \Cart::session(auth()->id())->getContent();
        return view('cart.cartView', compact('cartItems'));
    }
    public function delete($rowId){
        \Cart::session(auth()->id())->remove($rowId);
        return back();
    }
    public function AllItemDelete(){
        \Cart::session(auth()->id())->clear();
        return back();
    }
}
