<table class="table table-responsive" id="cargoLetters-table">
    <thead>
        <th>License Plate</th>
        <th>Customer Id</th>
        <th>User Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($cargoLetters as $cargoLetter)
        <tr>
            <td>{!! $cargoLetter->license_plate !!}</td>
            <td>{!! $cargoLetter->customer_id !!}</td>
            <td>{!! $cargoLetter->user_id !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.cargoLetters.destroy', $cargoLetter->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.cargoLetters.show', [$cargoLetter->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.cargoLetters.edit', [$cargoLetter->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>