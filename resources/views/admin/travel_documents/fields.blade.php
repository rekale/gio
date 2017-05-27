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

<div class="form-group col-sm-12">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::textarea('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Save</button>
    <a href="{!! route('admin.travelDocuments.index') !!}" class="btn btn-default">Cancel</a>
</div>

<div class="modal fade" id="myModal"  tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tap Your Card</h4>
      </div>
      <div class="modal-body">
            {!! Form::label('card_id', 'Card Id:') !!}
            {!! Form::text('card_id', null, ['class' => 'form-control', 'id' => 'myInput']) !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@section('scripts')
    <script type="text/javascript">
        $('#myModal').on('shown.bs.modal', function () {
          $('#myInput').focus();
        });
    </script>
@endsection
