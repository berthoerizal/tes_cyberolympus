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
            <form action="{{route('cari_customer')}}">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                          <label for="start_date">Start Date</label>
                          <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" aria-describedby="start_date"  name="start_date" value="{{request('start_date')}}">
                          @error('start_date')
                          <div class="text-danger">{{$message}}</div>
                          @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label for="finish_date">Finish Date</label>
                          <input type="date" class="form-control @error('finish_date') is-invalid @enderror" id="finish_date" aria-describedby="finish_date"  name="finish_date" value="{{request('finish_date')}}">
                          @error('finish_date')
                          <div class="text-danger">{{$message}}</div>
                          @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label for="customer_name">Customer Name</label>
                          <input type="text" class="form-control @error('customer_name') is-invalid @enderror" id="customer_name" aria-describedby="customer_name"  name="customer_name" value="{{request('customer_name')}}">
                          @error('customer_name')
                          <div class="text-danger">{{$message}}</div>
                          @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="float-right">
                            <a href="{{route('cari_order')}}" class="btn btn-light">Reset</a>
                            <button type="submit" class="btn btn-primary">Cari Customer</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    Total Order
                </div>
                <div class="card-body">
                    {{$total_order->total_order}}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    Total Item
                </div>
                <div class="card-body">
                    {{$total_item->total_item}}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    Jumlah qty
                </div>
                <div class="card-body">
                    @if (!$jumlah_qty->jumlah_qty || $jumlah_qty->jumlah_qty=="" || $jumlah_qty->jumlah_qty==NULL)
                        0
                    @else
                    {{$jumlah_qty->jumlah_qty}}
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    Total Pembayaran
                </div>
                <div class="card-body">
                @if (!$total_bayar->total_bayar || $total_bayar->total_bayar=="" || $total_bayar->total_bayar==NULL)
                0
                @else
                {{$total_bayar->total_bayar}}
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
