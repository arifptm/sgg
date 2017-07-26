<table class="table table-responsive" id="products-table">
    <thead>
        <th>Title</th>
        <th>Slug</th>
        <th>Register Date</th>
        <th>Body</th>
        @role('superadministrator')
            <th>Image</th>
        @endrole
        <th>Price</th>
        <th>Url</th>
        <th>Placement</th>
        <th>Disposable</th>
        <th>Stock</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{!! $product->title !!}</td>
            <td>{!! $product->slug !!}</td>
            <td>{!! $product->register_date !!}</td>
            <td>{!! $product->body !!}</td>
            @role('superadministrator')
                <td>{!! $product->image !!}</td>
            @endrole
            <td>{!! $product->price !!}</td>
            <td>{!! $product->url !!}</td>
            <td>{!! $product->placement !!}</td>
            <td>{!! $product->disposable !!}</td>
            <td>{!! $product->stock !!}</td>
            <td>
                {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('products.show', [$product->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('products.edit', [$product->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>