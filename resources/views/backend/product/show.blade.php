@extends('backend.layouts.master')

@section('title','Order Detail')

@section('main-content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <!-- /.card -->

                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Show Table</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $product->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Hsn </th>
                                        <td> {{ $product->hsn }} </td>
                                    </tr>
                                    <tr>
                                        <th>Name</th>
                                        <td>{{ $product->name }}</td>
                                    </tr>
                                    <tr>
                                        <th> Stock Quantity </th>
                                        <td> {{ $product->stock_quantity }} </td>
                                    </tr>
                                    <tr>
                                        <th> Description </th>
                                        <td> {!! $product->description !!} </td>
                                    </tr>
                                    <tr>
                                        <th> Additional Information </th>
                                        <td> {!! $product->additional_information !!} </td>
                                    </tr>
                                    <tr>
                                        <th> Min Qty </th>
                                        <td> {{ $product->min_qty }} </td>
                                    </tr>
                                    <tr>
                                        <th> Price </th>
                                        <td> {{ $product->price }} </td>
                                    </tr>
                                    <tr>
                                        <th> related_products </th>
                                        <td>
                                            @foreach($relatedProductsList as $key=>$relatedProduct)
									                 {{$relatedProduct }},
								            @endforeach 
                                        </td>
                                    </tr>

                                    <tr>
                                        <th> Status </th>
                                        <td> {{ isset($product) && $product->status == 1 ? 'Active' : 'Disabled'  }}
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Show Table</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Size</th>
                                        <th>Image</th>
                                        <th>Stock</th>
                                        <th>Price</th>
                                        <th>Sale Amount</th>
                                        <th>Discount</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($product->sizesstock as $key => $stock)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$stock->productSize->name}}</td>
                                        <td> 
                                            @foreach($product_images as $image)
                                                @if($image->size_id == $stock->size_id && $image->product_id == $stock->product_id)
                                                    <img src="{{ asset($image->image) }}" alt="image" style="height:50px; width: 40px;">
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{$stock->stock_qty}}</td>
                                        <td>{{$stock->price}}</td>
                                        <td>{{$stock->sale_price}}</td>
                                        <td>{{$stock->discount}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                    </div>

                </div>


            </div>
        </div>
    </section>
</div>

@endsection