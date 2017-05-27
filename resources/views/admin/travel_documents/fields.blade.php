<!-- Cargo Letter Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cargo_letter_id', 'Cargo Letter Id:') !!}
    {!! Form::select('cargo_letter_id', $cargoes, null, ['class' => 'form-control']) !!}
</div>

<!-- Arrive At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('arrive_at', 'Arrive At:') !!}
    {!! Form::date('arrive_at', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('card_id', 'Card Id:') !!}
    {!! Form::text('card_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.travelDocuments.index') !!}" class="btn btn-default">Cancel</a>
</div>
