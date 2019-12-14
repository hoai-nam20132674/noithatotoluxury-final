<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OrdersDetail;
use App\ProductsDetail;
use App\Products;
use App\OrderLogs;
use App\OrderDetailLogs;
use Mail;
use App\Mail\Order;

class Orders extends Model
{
    //
    protected $table = 'orders';
    public function addOrder($cart,$request){
    	$order = new Orders;
    	$order->name = $request->name;
    	$order->phone = $request->phone;
        if($request->email == ''){
            $order->email = 'null';
        }
        else{
            $order->email = $request->email;
        }
        if($request->address == ''){
            $order->address = 'null';
        }
        else{
            $order->address = $request->address;
        }
        if($request->messages == ''){
            $order->messages = 'null';
        }
        else{
            $order->messages = $request->messages;
        }
    	$order->status = 0;
    	$order->save();
        $orderLog = new OrderLogs;
        $orderLog->orders_id = $order->id;
        $orderLog->content = '<p>Khởi tạo đơn hàng</p>';
        $orderLog->save();
    	foreach($cart as $item){
    		$order_detail = new OrdersDetail;
    		$order_detail->orders_id = $order->id;
    		$order_detail->products_detail_id = $item->id;
    		$order_detail->amount = $item->quantity;
            $order_detail->comment = '';
            $order_detail->status = 0;
    		$order_detail->save();
            $prd = ProductsDetail::where('id',$order_detail->products_detail_id)->get()->first();
            $oDL = new OrderDetailLogs;
            $oDL->orders_detail_id = $order_detail->id;
            $oDL->content = '<p>Khởi tạo đơn hàng chi tiết</p><p>Số lượng: '.$order_detail->amount.'</p><p>Giá: '.$prd->sale.'</p>';
            $oDL->save();
    		$product_detail = ProductsDetail::where('id',$item->id)->get()->first();
    		$old_amount = $product_detail->amount;
    		$product_detail->amount = $old_amount-$item->quantity;
    		$product_detail->save();
            $product = Products::where('id',$product_detail->products_id)->get()->first();
            $product->amount = $product->amount - $item->quantity;
            $product->save();
            
    	}

        Mail::send(new Order($order));
    }
}
