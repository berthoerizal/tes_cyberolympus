@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mt-4">{{$title}}</h1>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name Product</th>
                                    <th>Category</th>
                                    <th>Price Sell</th>
                                    <th>Price Promo</th>
                                    <th>Price Agent</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $product)
                                <tr>
                                    <td>{{ $products->firstItem() + $key }}.</td>
                                    <td>{{$product->product_name}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->price_sell}}</td>
                                    <td>{{$product->price_promo}}</td>
                                    <td>{{$product->price_agent}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="float-left">
                            {{$products->links('pagination::bootstrap-4')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
