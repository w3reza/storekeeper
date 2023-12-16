@extends('backend.layouts.app')
@section('title', 'Add Product')
@section('content')

    <div class="row">

        <div class="col-xl-12">
            <div class="callout callout-info mt-2">
                <div class="row">

                    <div class="col-md-6  mt-2">
                        <h5><i class="nav-icon fas fa-pencil-alt"></i> Add Product</h5>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add Product</li>
                        </ol>
                    </div><!-- /.col -->
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card" style="border-radius: 15px;">

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('product.update', ['id' => $product->id]) }}" method="post" id="productCreate" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row align-items-center pt-2 pb-1"> <!--row Start -->
                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Product Title</h6>
                            </div>
                            <div class="col-md-10 pe-5">
                                <input type="text" name="product_title" class="form-control form-control-lg"
                                    placeholder="Product Title"value="{{ old('product_title', $product->product_title) }}" required />
                            </div>
                        </div> <!--row end -->
                        <hr class="mx-n3">

                        <div class="row align-items-center pt-2 pb-1"> <!--row Start -->
                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Product Deatils</h6>
                            </div>

                            <div class="col-md-10 pe-5">
                                <div class="card card-outline card-info">

                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <!-- Hidden input for Summernote content -->
                                    <input type="hidden" id="summernote-content" name="product_deatils">
                                    <textarea id="summernote" name="summernote_content">
                                        {{ old('product_details', $product->product_details) }}

                                  </textarea>
                                    </div>

                                </div>
                            </div>
                            <!-- /.col-->
                        </div>
                        <!-- ./row -->

                        <hr class="mx-n3">

                        <div class="row align-items-center pt-2 pb-1"> <!--row Start -->
                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Sell Price</h6>
                            </div>
                            <div class="col-md-10 pe-5">
                                <input type="text" name="sell_price" class="form-control form-control-lg"
                                    placeholder="Sell Price"  value="{{ old('sell_price', $product->sell_price) }}" required />
                            </div>
                        </div> <!--row end -->

                        <hr class="mx-n3">

                        <div class="row align-items-center pt-2 pb-1"> <!--row Start -->
                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Stock Quantity</h6>
                            </div>
                            <div class="col-md-10 pe-5">
                                <input type="text" name="stock_quantity" class="form-control form-control-lg"
                                    placeholder="Stock Quantity" value="{{ old('sell_price', $product->stock_quantity) }}" required />
                            </div>
                        </div> <!--row end -->


                        <hr class="mx-n3">

                        <div class="row align-items-center pt-2 pb-1"> <!--row Start -->
                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Product Image</h6>
                            </div>
                            <div class="col-md-10 pe-5">
                                <div class="form-group">

                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="product_photo" class="custom-file-input"
                                                id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!--row end -->

                        {{-- <div class="row align-items-center py-1"><!--row Start -->
                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Company Name</h6>
                            </div>
                            <div class="col-md-10 pe-5">
                                <div class="">
                                    <select id="inputStatus" class="form-control custom-select">
                                        <option selected disabled>Select one</option>
                                        <option>Company ABC</option>
                                        <option>Company ABC 2</option>
                                        <option>Company ABC 3</option>
                                    </select>
                                </div>
                            </div>
                        </div> <!--row end --> --}}





                        <div class="row align-items-center py-1 mt-2"> <!--row Start -->
                            <div class="col-md-4 ps-5"> </div>
                            <div class="col-md-3 pe-5">
                                <button type="reset" class="btn btn-default">Reset</button>
                                <button type="submit" class="btn btn-info">Submit</button>
                            </div>
                        </div> <!--row end -->

                    </div> <!--card body End-->

                </form>
                <script>
                    $(document).ready(function() {
                        $('#productCreate').submit(function(e) {
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

            </div>
        </div>
    </div>


    </div>




@endsection
