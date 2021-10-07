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
                                    <th>Invoice</th>
                                    <th>Customer Name</th>
                                    <th>Agent Name</th>
                                    <th>Jumlah qty</th>
                                    <th>Jumlah item</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $key => $order)
                                <tr>
                                    <td>{{ $orders->firstItem() + $key }}.</td>
                                    <td>{{$order->invoice_id}}</td>
                                    <td>{{$order->name}}</td>
                                    <td>{{$order->first_name}} {{$order->last_name}}</td>
                                    <td>{{$order->sum_qty}}</td>
                                    <td>{{$order->count_item}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="float-left">
                            {{$orders->links('pagination::bootstrap-4')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
