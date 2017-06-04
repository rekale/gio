<table class="table table-responsive" id="customers-table">
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($customers as $customer)
        <tr>
            <td>{!! $customer->customer_id !!}</td>
            <td>{!! $customer->name !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.customers.destroy', $customer->customer_id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.customers.show', [$customer->customer_id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.customers.edit', [$customer->customer_id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
