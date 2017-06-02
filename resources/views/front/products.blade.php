@extends('layouts.front.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <h3>Kategori</h3>
            <hr>
            <ul class="list-group">
              @foreach($categories as $category)
                <a class="list-group-item  {{Request::input('category') == $category->name ? 'active' : ''}}" href="{{ route('home.products', ['category' => $category->name]) }}">{{ $category->name }}</a>
              @endforeach
            </ul>
        </div>

        <div class="col-md-9">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li><a href="#">Products</a></li>
            </ol>
            @foreach($products->chunk(4) as $productChunks)
                <div class="row">
                    @foreach($productChunks as $product)
                        <div class="col-md-3">
                            <div class="thumbnail">
                              <img src="{{ $product->image }}" alt="{{ $product->name }}">
                              <div class="caption">
                                <h4>{{ $product->name }}</h4>
                                <p>Rp. {{ $product->price }}</p>
                                <p><a href="{{ route('home.products.detail', ['id' => $product->id]) }}" class="btn btn-primary" role="button">More</a></p>
                              </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach


        </div>
    </div>
</div>
@endsection
