@role('user||super||admin')
<li class="{{ Request::is('products*') ? 'active' : '' }}">
    <a href="{!! route('products.create') !!}"><i class="fa fa-edit"></i><span>Usulan</span></a>
</li>

<li class="{{ Request::is('lineitems*') ? 'active' : '' }}">
    <a href="{!! route('lineitems.create') !!}"><i class="fa fa-car"></i><span>Permintaan</span></a>
</li>
@endrole

@role('admin||super')
<hr>
<li class="{{ Request::is('products*') ? 'active' : '' }}">
    <a href="/manage/users"><i class="fa fa-car"></i><span>Barang</span></a>
</li>

<li class="{{ Request::is('products*') ? 'active' : '' }}">
    <a href="/manage/users"><i class="fa fa-car"></i><span>Daftar Permintaan</span></a>
</li>

<li class="{{ Request::is('products*') ? 'active' : '' }}">
    <a href="/manage/users"><i class="fa fa-car"></i><span>Daftar Usulan</span></a>
</li>
@endrole

@role('super')
<hr>
<li class="{{ Request::is('products*') ? 'active' : '' }}">
    <a href="/manage/users"><i class="fa fa-car"></i><span>User</span></a>
</li>
@endrole
