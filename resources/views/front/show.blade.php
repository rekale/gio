@extends('layouts.front.app')

@section('content')
<div class="container">
    <div class="col-md-10 col-md-offset-1 thumbnail" style="padding: 40px 15px">
        <h1>{{ $destination->title }}</h1>
        <hr>
        <img src="{{ $destination->image }}" class="img-responsive img-thumbnail">
        <div class="caption">
          <p>{!! $destination->body !!}</p>
        </div>
    </div>
</div>
@endsection
