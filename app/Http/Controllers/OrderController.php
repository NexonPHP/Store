<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Request;

class OrderController extends Controller {

        public function index($per_page) {
            $orders = Order::paginate($per_page);
            return response()->json($orders);
        }

        public function create(Request $request) {
            $order = Order::create($request->all());
            return response()->json($order);
        }

        public function get($id) {
            $order = Order::where('id', $id)->first();
            if($order == null) {
                return response()->json(['message' => 'Order not found'], 404);
            }
            return response()->json($order);
        }
}
