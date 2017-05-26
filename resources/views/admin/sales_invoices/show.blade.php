@extends('layouts.admin.app')

@section('content')
    <section class="content-header">
        <h1>
            Sales Invoice {{ $doc->cargo_letter_id }}
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    <div class="col-md-8">
                        <label>Customer: </label>
                        <span>{{ $cargo->customer->name }}</span>
                    </div>
                    <div class="col-md-4">
                        <label>Date: </label>
                        <span>{{$doc->unloading_at->format('d-m-Y')}}</span>
                    </div>
                    <div class="col-md-8">
                        <label>Address: </label>
                        <span>{{ $doc->address }}</span>
                    </div>
                    <div class="col-md-4">
                        <label>Due Date: </label>
                        <span>Cash</span>
                    </div>
                    <div class="col-md-12 content">
                        <div class="clearfix"></div>
                            <div class="box box-primary">
                                <div class="box-body">
                                        @include('admin.sales_invoices.table')
                                </div>
                            </div>
                    </div>
                    <div>
                        <a href="{!! route('admin.travelDocuments.index') !!}" class="btn btn-default">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
