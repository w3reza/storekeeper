<?php

namespace App\Http\Controllers\Backend;;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SaleController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->get();

        return view('backend.pages.sales', compact('products'));
    }

    public function store(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        // Validate input if necessary

        // Get the current stock and sell price of the product
        $product = DB::table('products')->select('stock_quantity', 'sell_price')->where('id', $productId)->first();

        // Check if there is enough stock to sell
        if ($product->stock_quantity >= $quantity) {
            // Calculate the total price
            $totalPrice = $quantity * $product->sell_price;

            // Store the sale record
            $saleId = DB::table('sales')->insertGetId([
                'product_id' => $productId,
                'quantity' => $quantity,
                'sell_price' => $product->sell_price,
                'total_price' => $totalPrice,

            ]);

            // Decrement the stock
            DB::table('products')->where('id', $productId)->decrement('stock_quantity', $quantity);

            // Add your logic for recording the sale, generating an invoice, etc.

            return redirect()->route('sales.show')->with('success', 'Product sold successfully. Sale ID: ' . $saleId);
        } else {
            return redirect()->route('sales.show')->with('error', 'Insufficient stock.');
        }
    }
}
