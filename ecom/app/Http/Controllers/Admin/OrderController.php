<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomerInfo;
use App\Models\Discount;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Province;
use App\Http\Controllers\User\PurchaseHistoryController; // Import the PurchaseHistoryController class

use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected PurchaseHistoryController $purchaseHistoryController;

    public function __construct(PurchaseHistoryController $purchaseHistoryController)
    {
        $this->purchaseHistoryController = $purchaseHistoryController;
    }
    public function Index(Request $request)
    {
        $status = $request->input('status', 'all');

        switch ($status) {
            case 'pending':
            case 'processing':
            case 'canceled':
            case 'completed':
                $orders = Order::where('orderStatus', $status)
                    ->orderBy('orderID', 'desc')
                    ->paginate(20);
                break;

            case 'all':
            default:
                $orders = Order::orderBy('orderID', 'desc')->paginate(20);
                break;
        }

        $customerinfos = CustomerInfo::latest()->get();

        return view('admin.allorder', compact('orders', 'customerinfos', 'status'));
    }
    public function DetailOrder($orderID)
    {
        // $products = Product::latest()->get();
        $provinces = Province::latest()->get();
        $order = Order::where('orderID', $orderID)->first(); // 10
        $orderdetails = OrderDetail::where('orderID', $orderID)->get(); // 10
        $customerinfo = CustomerInfo::leftJoin('orders', 'orders.customerID', '=', 'customer_infos.customerID')->where('orders.orderID', $orderID)->first();
        $discount = Discount::leftJoin('orders', 'orders.discountID', '=', 'discounts.discountID')->where('orders.orderID', $orderID)->first();
        return view('admin.detailorder', compact('order', 'customerinfo', 'provinces', 'orderdetails', 'discount'));
    }

    public function UpdateOrderStatus(Request $request)
    {
        $orderID = $request->orderID;
        $order = Order::where('orderID', $orderID)->first();
        $request->validate([
            'orderStatus' => 'required|string|max:255', // Adjust max length accordingly
        ]);

        order::findOrFail($orderID)->update([
            'orderStatus' => $request->orderStatus,
            'orderCompletedDate' => $request->orderCompletedDate,
        ]);

        if ($request->orderStatus == 'completed') {
            $this->purchaseHistoryController->storePurchaseHistory($orderID, $order->grandPrice, "COD");
        }

        //   $this->purchaseHistoryController->storePurchaseHistory($orderID, $request->totalPrice, $request->paymentMethod);

        return redirect()->route('detailorder', $orderID)->with('message', 'Cập nhật thành công');
    }

    public function SearchOrder(Request $request)
    {
        $customerinfos = CustomerInfo::latest()->get();

        if ($request->has('start_date') && $request->has('end_date')) {
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');

            // Validate the dates if needed
            $request->validate([
                'start_date' => 'required|date',
                'end_date' => 'required|date',
            ]);

            $orders = Order::whereDate('orderCreatedDate', '>=', $startDate)
                ->whereDate('orderCreatedDate', '<=', $endDate)
                ->paginate(10);

            return view('admin.allorder', compact('orders', 'customerinfos'));
        }

        // Handle other cases or provide a default behavior
    }
}
