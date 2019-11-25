<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OrdersDetail;
use App\ProductsDetail;
use App\Products;

class Orders extends Model
{
    //
    protected $table = 'orders';
    public function addOrder($cart,$request){
    	$order = new Orders;
    	$order->name = $request->name;
    	$order->phone = $request->phone;
    	$order->email = $request->email;
    	$order->address = $request->address;
    	$order->messages = $request->messages;
    	$order->status = 0;
    	$order->save();
    	foreach($cart as $item){
    		$order_detail = new OrdersDetail;
    		$order_detail->orders_id = $order->id;
    		$order_detail->products_detail_id = $item->id;
    		$order_detail->amount = $item->quantity;
    		$order_detail->save();
    		$product_detail = ProductsDetail::where('id',$item->id)->get()->first();
    		$old_amount = $product_detail->amount;
    		$product_detail->amount = $old_amount-$item->quantity;
    		$product_detail->save();
            $product = Products::where('id',$product_detail->products_id)->get()->first();
            $product->amount = $product->amount - $item->quantity;
            $product->save();
    	}
    }
}
