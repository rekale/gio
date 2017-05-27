@extends('layouts.admin.app')

@section('content')
    <section class="content-header">
        <h1>
            Cargo Letter
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('admin.cargo_letters.show_fields')
                    <div class="clearfix"></div>
                    <div class="content">
                        <table class="table table-responsive" id="travelDocuments-table">
                            <thead>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Note</th>
                            </thead>
                            <tbody id="product">

                                @foreach($cargoLetter->products as $cargoProduct)
                                    <tr>
                                        <td>
                                            {{$cargoProduct->name}}
                                        </td>
                                         <td>
                                            {{ $cargoProduct->pivot->quantity }}
                                        </td>
                                        <td>
                                            {{ $cargoProduct->pivot->note ?? '-' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <a href="{!! route('admin.cargoLetters.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
