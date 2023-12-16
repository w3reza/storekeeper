@extends('backend.layouts.app')
@section('title', 'Job List ')
@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <h3 class="card-title"><a href="{{ route('product.create') }}">
                            <button type="button" class="btn btn-outline-primary mb-2"><i class="fa fa-edit"></i> Add
                                Job</button>
                        </a></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <h1>Sales Page</h1>

                    @if (session('success'))
                        <div style="color: green;">{{ session('success') }}</div>
                    @elseif(session('error'))
                        <div style="color: red;">{{ session('error') }}</div>
                    @endif

                    <form action="{{ route('sale.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">



                            <div class="col-4">
                                <div class="form-group">
                                    <label for="product_id">Product:</label>
                                    <select id="inputStatus" class="form-control custom-select" name="product_id">
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->product_title }}
                                                ({{ $product->stock_quantity }} in stock)</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-4 pe-5">
                                <div class="form-group">
                                    <label>Quantity:</label>
                                    <div class="input-group">

                                        <input type="number" class="form-control " placeholder="Quantity"name="quantity"
                                            min="1" required>
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fa fa-shopping-cart"></i> Sell Product

                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </div>
                    </form>





                    {{-- <form action="enhanced-results.html">
                        <div class="row">



                            <div class="col-4">
                                <div class="form-group">
                                    <label>location By:</label>
                                    <select id="inputStatus" class="form-control custom-select">
                                        <option selected disabled>Select one</option>
                                        <option>Dhaka</option>
                                        <option>Savar</option>
                                        <option>Company ABC 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Category By:</label>
                                    <select id="inputStatus" class="form-control custom-select">
                                        <option selected disabled>Select one</option>
                                        <option>Dhaka</option>
                                        <option>Savar</option>
                                        <option>Company ABC 3</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-4 pe-5">
                                <div class="form-group">
                                    <label>Text By:</label>
                                    <div class="input-group">

                                        <input type="search" class="form-control " placeholder="Type your keywords here"
                                            value="Lorem ipsum">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form> --}}

                    {{-- <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Photo</th>
                                <th>Title</th>

                                <th>Price</th>
                                <th>Stoce</th>
                                <th style="width: 250px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key => $product)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td> <img src="{{ asset('product_photos/' . $product->product_photo) }}"
                                            alt="Product Photo" width="50"></td>
                                    <td>{{ $product->product_title }}</td>
                                    <td>{{ $product->sell_price }}</td>
                                    <td>{{ $product->stock_quantity }}</td>

                                    <td>
                                        <div class="d-grid gap-2 d-md-block">
                                            <button type="button" class="btn btn-outline-success btn-flat"><i
                                                    class="fas fa-users nav-icon"></i> </button>
                                            <a href="{{ route('product.edit', $product->id) }}"><button type="button"
                                                    class="btn btn-outline-info btn-flat"><i class="fas fa-pencil-alt"></i>
                                                    Edit</button></a>
                                                    <a href="{{ route('product.delete', $product->id) }}">
                                                        <button type="button" class="btn btn-outline-danger btn-flat" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $product->id }}">
                                                            <i class="fa fa-trash"></i> Delete
                                                        </button>
                                                </a>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table> --}}
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div>
            <!-- /.card -->

        </div>
        <!-- /.col -->


    </div>
    <!-- /.row -->
@endsection
