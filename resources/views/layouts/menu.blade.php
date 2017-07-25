<li class="{{ Request::is('products*') ? 'active' : '' }}">
    <a href="{!! route('admin.products.index') !!}"><i class="fa fa-edit"></i><span>Products</span></a>
</li>
<hr>

<li class="{{ Request::is('products*') ? 'active' : '' }}">
    <a href="{!! route('admin.products.index') !!}"><i class="fa fa-car"></i><span>Tambah Usulan</span></a>
</li>

