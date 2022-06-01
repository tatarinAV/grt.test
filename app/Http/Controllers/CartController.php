<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $items, $products, $totalQty, $totalPrice;

    public function index(Request $request)
    {
        $cart = request->session->has('cart') ? $request->session->get('cart') : NULL;
        return response()->json($cart);
    }

    public function addCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = $request->session->has('cart') ? $request->session->get('cart') : NULL;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->Session->put('cart', $cart);
        $request->session->flash('add-product', $product->name);
        return response()->json([$id => 'added to cart']);
    }

    public function add($product, $id){
        $storedProduct = [
            'qty' => 0,
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'cost' => $product->price,
        ];
        if($this->items){
            if(array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
            }
        }
        $storedProduct['qty']++;
        $storedProduct['cost'] = $product->price * $storedProduct['qty'];
        $this->products[$id] = $storedProduct;
        $this->totalQty++;
        $this->totalPrice += $product->price;
    }
}
