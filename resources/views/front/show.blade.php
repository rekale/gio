@extends('layouts.front.app')

@section('content')
<div class="container">
    <div class="col-md-10 col-md-offset-1 thumbnail" style="padding: 40px 15px">
        <h1>{{ $product->title }}</h1>
        <hr>
        <img src="{{ $product->image }}" class="img-responsive img-thumbnail">
        <div class="caption">
          <p>{!! $product->body !!}</p>
        </div>
    </div>
</div>
@endsection
