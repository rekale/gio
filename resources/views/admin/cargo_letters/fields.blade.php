<!-- License Plate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('license_plate', 'License Plate:') !!}
    {!! Form::text('license_plate', null, ['class' => 'form-control']) !!}
</div>

<!-- customer Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customer', 'Customer:') !!}
    {!! Form::select('customer_id', $customers->pluck('name', 'id'), null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.cargoLetters.index') !!}" class="btn btn-default">Cancel</a>
</div>
