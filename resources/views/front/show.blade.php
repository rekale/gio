@extends('layouts.front.app')

@section('content')
<div class="container-fluid">
    <div class="col-md-9 thumbnail" style="padding: 40px 15px">
        <h1>{{ $product->title }}</h1>
        <hr>
        <img src="{{ $product->image }}" class="img-responsive img-thumbnail">
        <div class="caption">
            <h3>Detail</h3>
          <p>{!! $product->detail !!}</p>
        </div>
    </div>
    <div class="col-md-3" style="padding: 140px 15px">
        <h3>Spesification</h3>
        <table class="table table-striped">
            <tr>
                <th>Name</th>
                <td>{{$product->name}}</td>
            </tr>
            <tr>
                <th>Berat</th>
                <td>{{$product->weight}}</td>
            </tr>
            <tr>
                <th>Harga</th>
                <td>{{$product->price}}</td>
            </tr>
        </table>
        <hr>
    </div>
</div>
@endsection
