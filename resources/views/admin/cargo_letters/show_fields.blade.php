<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $cargoLetter->id !!}</p>
</div>

<!-- License Plate Field -->
<div class="form-group">
    {!! Form::label('license_plate', 'License Plate:') !!}
    <p>{!! $cargoLetter->license_plate !!}</p>
</div>

<!-- Customer Id Field -->
<div class="form-group">
    {!! Form::label('customer', 'Customer:') !!}
    <p>{!! $cargoLetter->customer->name !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user', 'Author:') !!}
    <p>{!! $cargoLetter->user->name!!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $cargoLetter->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $cargoLetter->updated_at !!}</p>
</div>

