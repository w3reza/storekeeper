<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class productController extends Controller
{
    public function show()
    {
        $products = DB::table('products')
            ->orderBy('id', 'desc')
            ->get();
        return view('backend.pages.products', compact('products'));
    }
    public function create()
    {
        return view('backend.pages.product_create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'product_title' => 'required|max:255',
            // comes form summernote textarea
            'summernote_content' => 'required',
            'sell_price' => 'required|numeric',
            'stock_quantity' => 'required|integer',
            'product_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle product photo upload
        $imageName = null;
        if ($request->hasFile('product_photo')) {
            $image = $request->file('product_photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('product_photos'), $imageName);
        }

        // Use query builder to insert data
        DB::table('products')->insert([
            'product_title' => $request->get('product_title'),
            'product_details' => $request->input('summernote_content'),
            'sell_price' => $request->get('sell_price'),
            'stock_quantity' => $request->get('stock_quantity'),
            'product_photo' => $imageName,
        ]);

        return redirect()
            ->route('product.create')
            ->with('success', 'Product added successfully!');
    }

    public function edit($id)
    {
        // Retrieve the product using Query Builder
        $product = DB::table('products')
            ->where('id', $id)
            ->first();

        // Check if the product exists
        if (!$product) {
            abort(404); // or handle the situation as needed
        }

        return view('backend.pages.product_edit', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'product_title' => 'required',
            'summernote_content' => 'required',
            'sell_price' => 'required|numeric',
            'stock_quantity' => 'required|integer',
            'product_photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file types and size as needed
        ]);

        // Retrieve the current product
        $product = DB::table('products')
            ->where('id', $id)
            ->first();

        if (!$product) {
            abort(404);
        }

        // Handle product photo upload
        $imageName = null;
        if ($request->hasFile('product_photo')) {
            // Delete the old photo
            if ($product->product_photo) {
                $oldImagePath = public_path('product_photos') . '/' . $product->product_photo;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Upload the new photo
            $image = $request->file('product_photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('product_photos'), $imageName);
        }

        // Update the product using Query Builder
        DB::table('products')
            ->where('id', $id)
            ->update([
                'product_title' => $request->input('product_title'),
                'product_details' => $request->input('summernote_content'),
                'sell_price' => $request->input('sell_price'),
                'stock_quantity' => $request->input('stock_quantity'),
                'product_photo' => $imageName,
            ]);

        // Redirect back or to a different route
        return redirect()
            ->route('products.show')
            ->with('success', 'Product updated successfully!');
    }

    public function destroy($id)
    {
        // Retrieve the current product
        $product = DB::table('products')->where('id', $id)->first();

        if (!$product) {
            abort(404);
        }

        // Delete the product photo from storage
        if ($product->product_photo) {
            $photoPath = public_path('product_photos') . '/' . $product->product_photo;

            // Check if the file exists before attempting to delete
            if (file_exists($photoPath)) {
                unlink($photoPath);
            }
        }

        // Delete the product from the database
        DB::table('products')->where('id', $id)->delete();

        // Redirect back or to a different route
        return redirect()->route('products.show')->with('success', 'Product deleted successfully!');
    }

}
