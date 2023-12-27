<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;

class BusinessController extends Controller
{
    public function checkProduct()
    {
        $categories = Category::latest()->get();
        $subcategories = Subcategory::latest()->get();
        $products = Product::latest()->get();

        return view('admin.business', compact('categories', 'subcategories', 'products'));
    }

    // Function to fetch subcategories based on the selected category
    public function fetchResults(Request $request)
    {
        // Retrieve form data
        $productCategoryID = $request->input('productCategoryID');
        $productSubCategoryID = $request->input('productSubCategoryID');
        $productID = $request->input('productID');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
    
        // Add logic to query the database and fetch results based on the provided parameters
        $results = OrderDetail::select('products.productName', 'order_details.created_at', 'order_details.productQuantity')
        ->join('products', 'order_details.productID', '=', 'products.productID')
        ->where('products.productCategoryID', $productCategoryID)
        ->where('products.productSubCategoryID', $productSubCategoryID)
        ->where('products.productID', $productID)
        ->where('order_details.orderDetailStatus', '<>', 'canceled') // Exclude 'canceled' status
        ->where(function ($query) use ($startDate, $endDate) {
            $query->whereDate('order_details.created_at', '>=', $startDate)
                  ->whereDate('order_details.created_at', '<=', $endDate);
        })
        ->get();
    
        // Return the results as JSON
        return response()->json($results);
    }
}
