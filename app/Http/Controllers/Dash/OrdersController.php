<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrdersResource;
use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OrdersController extends Controller
{
    public function pending()
    {
        Carbon::setLocale('ar');
        $orders = Order::paginate(6);
        if (count($orders) > 0) {
            return OrdersResource::collection($orders);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'there is no such orders'
            ], 200);
        }
    }

    public function order($id)
    {
        Carbon::setLocale('ar');
        $order = Order::find($id);
        if ($order) {
            return response()->json([
                'success' => true,
                'order' => new OrdersResource($order)
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'there is no such order'
            ], 404);
        }
    }

    public function accepted()
    {
        Carbon::setLocale('ar');
        $orders = Order::where('status', 'accepted')->get();
        return view('admin.orders.accepted', compact('orders'));
    }

    public function rejected()
    {
        Carbon::setLocale('ar');
        $orders = Order::where('status', 'rejected')->get();
        return view('admin.orders.rejected', compact('orders'));
    }

    public function changeStatus(Request $request, $id)
    {
        Order::where('id', $id)->update(['status' => $request->status]);
        return back();
    }
}
