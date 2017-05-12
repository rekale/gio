@extends('layouts.front.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <h3>Kategori</h3>
            <hr>
            <ul class="list-group">
              <li class="list-group-item">Cras justo odio</li>
              <li class="list-group-item">Dapibus ac facilisis in</li>
              <li class="list-group-item">Morbi leo risus</li>
              <li class="list-group-item">Porta ac consectetur ac</li>
              <li class="list-group-item">Vestibulum at eros</li>
            </ul>
        </div>

        <div class="col-md-9">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                @foreach($productRandoms as $product)
                    <li data-target="#carousel-example-generic"
                    data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active':'' }}">
                    </li>
                @endforeach
              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                @foreach($productRandoms as $product)
                    <div class="item {{ $loop->first ? 'active':'' }}">
                      <img src="{{ $product->image }}" alt="{{ $product->name }}">
                      <div class="carousel-caption">
                        {{ $product->detail }}
                      </div>
                    </div>
                @endforeach
              </div>

              <!-- Controls -->
              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
            <br>

            @foreach($products->chunk(4) as $productChunks)
                <div class="row">
                    @foreach($productChunks as $product)
                        <div class="col-md-3">
                            <div class="thumbnail">
                              <img src="{{ $product->image }}" alt="{{ $product->name }}">
                              <div class="caption">
                                <h4>{{ $product->name }}</h4>
                                <p>Rp. {{ $product->price }}</p>
                                <p><a href="#" class="btn btn-primary" role="button">More</a></p>
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
