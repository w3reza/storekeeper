<!-- resources/views/products/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Edit Product</h1>

    <form action="{{ route('product.update', ['id' => $product->id]) }}" method="post" id="productEdit" enctype="multipart/form-data">        @csrf

        <!-- Product Title -->
        <div class="form-group">
            <label for="product_title">Product Title</label>
            <input type="text" name="product_title" value="{{ old('product_title', $product->product_title) }}" class="form-control" required>
        </div>

        <!-- Product Details -->
        <div class="form-group">
            <label for="product_deatils">Product Details</label>
            <textarea id="summernote" name="summernote_content">{{ old('product_deatils', $product->product_deatils) }}</textarea>
            <input type="hidden" id="summernote-content" name="product_deatils">
        </div>

        <!-- Sell Price -->
        <div class="form-group">
            <label for="sell_price">Sell Price</label>
            <input type="text" name="sell_price" value="{{ old('sell_price', $product->sell_price) }}" class="form-control" required>
        </div>

        <!-- Stock Quantity -->
        <div class="form-group">
            <label for="stock_quantity">Stock Quantity</label>
            <input type="text" name="stock_quantity" value="{{ old('stock_quantity', $product->stock_quantity) }}" class="form-control" required>
        </div>

        <!-- Product Photo -->
        <div class="form-group">
            <label for="product_photo">Product Photo</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" name="product_photo" class="custom-file-input" id="exampleInputFile">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
                <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                </div>
            </div>
        </div>

        <!-- Add other form fields as needed -->

        <div class="row align-items-center py-1 mt-2"> <!--row Start -->
            <div class="col-md-4 ps-5"> </div>
            <div class="col-md-3 pe-5">
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-info">Update</button>
            </div>
        </div> <!--row end -->
    </form>

    <script>
        $(document).ready(function() {
            $('#productEdit').submit(function(e) {
                e.preventDefault();

                // Get the Summernote content
                var summernoteContent = $('#summernote').summernote('code');

                // Set the Summernote content to the hidden input
                $('#summernote-content').val(summernoteContent);

                // Submit the form
                this.submit();
            });
        });
    </script>
@endsection
