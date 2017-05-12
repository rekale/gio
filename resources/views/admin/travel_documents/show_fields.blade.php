<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $travelDocument->id !!}</p>
</div>

<!-- Cargo Letter Id Field -->
<div class="form-group">
    {!! Form::label('cargo_letter_id', 'Cargo Letter Id:') !!}
    <p>{!! $travelDocument->cargo_letter_id !!}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', 'Address:') !!}
    <p>{!! $travelDocument->address !!}</p>
</div>

<!-- Arrive At Field -->
<div class="form-group">
    {!! Form::label('arrive_at', 'Arrive At:') !!}
    <p>{!! $travelDocument->arrive_at !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $travelDocument->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $travelDocument->updated_at !!}</p>
</div>

