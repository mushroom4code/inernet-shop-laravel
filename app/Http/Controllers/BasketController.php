<?php

namespace App\Http\Controllers;

use App\Classes\Basket;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function basket()
    {
        $order = (new Basket())->getOrder();
        return view('basket', compact('order'));
    }

    public function basketAdd(Product $product)
    {
        $result = (new Basket(true))->addProduct($product);

        if ($result) {
            session()->flash('success', __('basket.added').$product->__('name'));
        } else {
            session()->flash('warning', $product->__('name').__('basket.not_available_more'));
        }

        return redirect()->route('basket');
    }

    public function basketRemove(Product $product)
    {
        (new Basket())->removeProduct($product);

        session()->flash('warning', __('basket.removed').$product->__('name'));

        return redirect()->route('basket');
    }

}
