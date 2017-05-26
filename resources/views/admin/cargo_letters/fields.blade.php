<!-- License Plate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('license_plate', 'License Plate:') !!}
    {!! Form::text('license_plate', null, ['class' => 'form-control']) !!}
</div>

<!-- customer Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customer', 'Customer:') !!}
    {!! Form::select('customer_id', $customers->pluck('name', 'customer_id'), null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    <button class="btn btn-primary" type="button" onclick="add()">
        Add Product
    </button>
    <table class="table table-responsive" id="travelDocuments-table">
    <thead>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Note</th>
    </thead>
    <tbody id="product">
        @if(isset($cargoLetter))
        @php
            $diffProducts = $cargoLetter->products->diff($products);
        @endphp

        @foreach($cargoLetter->products as $cargoProduct)
            <tr>
                <td>
                    <select name="product_id[]" class="form-control">
                        <option></option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" {{ $product->id ===  $cargoProduct->id ? 'selected':''}}>
                                    {{ $product->name }}
                                </option>
                            @endforeach
                    </select>
                </td>
                 <td>
                    <input type="number" name="quantity[]" placeholder="qty" class="form-control" value="{{ $cargoProduct->pivot->quantity }}">
                </td>
                <td>
                    <input type="text" name="note[]" placeholder="note" class="form-control" value="{{ $cargoProduct->pivot->note }}">
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>

</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.cargoLetters.index') !!}" class="btn btn-default">Cancel</a>
</div>

<template id="productform">
    <tr>
        <td>
            <select name="product_id[]" class="form-control">
                <option></option>
                @if(isset($cargoLetter))
                    @php
                        $diffProducts = $products->diff($cargoLetter->products);
                    @endphp
                    @foreach($diffProducts as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                @else
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                @endif
            </select>
        </td>
        <td>
            <input type="number" name="quantity[]" placeholder="qty" class="form-control">
        </td>
        <td>
            <input type="text" name="note[]" placeholder="note" class="form-control">
        </td>
    </tr>
</template>

@section('scripts')
    <script type="text/javascript">
        function add() {
            var productForm = document.querySelector('#productform');
            var clone = document.importNode(productForm.content, true);

            document.querySelector('#product').appendChild(clone);
        }
    </script>
@endsection
