@extends('layouts.admin.app')

@section('content')
    <section class="content-header">
        <h1>
            Travel Document Verify
        </h1>
    </section>
    <div class="content">
        @include('flash::message')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'admin.travel.verify']) !!}

                        <div class="form-group col-sm-4 col-md-offset-4">
                            {!! Form::label('card_id', 'Tap your card:') !!}
                            {!! Form::text('card_id', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            <a href="{!! route('admin.travelDocuments.index') !!}" class="btn btn-default">Cancel</a>
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
