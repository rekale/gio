<table class="table table-responsive" id="travelDocuments-table">
    <thead>
        <th>Cargo Letter Id</th>
        <th>Address</th>
        <th>Arrive At</th>
        <th>Unloading At</th>
        <th>Verified</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($travelDocuments as $travelDocument)
        <tr>
            <td>{!! $travelDocument->cargo_letter_id !!}</td>
            <td>{!! $travelDocument->address !!}</td>
            <td>{!! $travelDocument->arrive_at !!}</td>
            <td>{!! isset($travelDocument->unloading_at) ? $travelDocument->unloading_at : '-' !!}</td>
            <td>{{ isset($travelDocument->unloading_at) ? 'yes' : 'no' }}</td>
            <td>
                {!! Form::open(['route' => ['admin.travelDocuments.destroy', $travelDocument->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.travelDocuments.show', [$travelDocument->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    @if(isset($travelDocument->unloading_at))
                        <a href="{!! route('admin.sales-invoices.show', [$travelDocument->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-book"></i></a>
                    @endif
                    <a href="{!! route('admin.travelDocuments.edit', [$travelDocument->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
