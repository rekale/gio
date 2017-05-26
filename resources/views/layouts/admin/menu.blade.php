<li class="{{ Request::is('categories*') ? 'active' : '' }}">
    <a href="{!! route('admin.categories.index') !!}"><i class="fa fa-edit"></i><span>Categories</span></a>
</li>

<li class="{{ Request::is('products*') ? 'active' : '' }}">
    <a href="{!! route('admin.products.index') !!}"><i class="fa fa-edit"></i><span>Products</span></a>
</li>

<li class="{{ Request::is('customers*') ? 'active' : '' }}">
    <a href="{!! route('admin.customers.index') !!}"><i class="fa fa-edit"></i><span>Customers</span></a>
</li>

<li class="{{ Request::is('cargoLetters*') ? 'active' : '' }}">
    <a href="{!! route('admin.cargoLetters.index') !!}"><i class="fa fa-edit"></i><span>Cargo Letters</span></a>
</li>

<li class="{{ Request::is('travelDocuments*') ? 'active' : '' }}">
    <a href="{!! route('admin.travelDocuments.index') !!}"><i class="fa fa-edit"></i><span>Travel Documents</span></a>
</li>

<li class="{{ Request::is('travel\verify') ? 'active' : '' }}">
    <a href="{!! route('admin.travel.verify') !!}"><i class="fa fa-edit"></i><span>Travel Verify</span></a>
</li>

