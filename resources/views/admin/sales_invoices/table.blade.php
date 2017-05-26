<table class="table table-responsive" id="travelDocuments-table">
    <thead>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Total</th>
    </thead>
    <tbody>
    @php $total = 0; @endphp
    @foreach($products as $product)
        @php $total += $product->pivot->quantity * $product->price; @endphp
        <tr>
            <td>{!! $product->name !!}</td>
            <td>{!! $product->pivot->quantity !!}</td>
            <td>{!! $product->price !!}</td>
            <td>{!! $product->pivot->quantity * $product->price !!}</td>
        </tr>
    @endforeach
        <tr>
            <td></td>
            <td></td>
            <th>Total: </th>
            <td>{{ $total }}</td>
        </tr>
    </tbody>
</table>
