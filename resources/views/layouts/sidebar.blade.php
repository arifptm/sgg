
<aside class="main-sidebar" id="sidebar-wrapper">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('/upload/image/am-icon.png') }}" class="img-circle"
                     alt="User Image"/>
            </div>
            <div class="pull-left info">
                @if (Auth::guest())
                <p>InfyOm</p>
                @else
                    <p>{{ Auth::user()->name}}</p>
                @endif
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            @role('user')
            <li class="{{ Request::is('products*') ? 'active' : '' }}">
                <a href="{!! route('products.index') !!}"><i class="fa fa-home"></i><span>Beranda</span></a>
            </li>

            <li class="{{ Request::is('lineitems*') ? 'active' : '' }}">
                <a href="{!! route('products.create') !!}"><i class="fa fa-bullhorn"></i><span>Tambah Usulan</span></a>
            </li>

            <li class="{{ Request::is('lineitems*') ? 'active' : '' }}">
                <a href='/orders'><i class="fa fa-shopping-cart"></i><span>Riwayat Permintaan</span></a>
            </li>
            @endrole

            @role('admin|super')

            <li class="{{ Request::is('manage/dashboard*') ? 'active' : '' }}">
                <a href="/"><i class="fa fa-home"></i><span>Dashboard</span></a>
            </li>

            <li class="{{ Request::is('manage/products*') ? 'active' : '' }}">
                <a href="/manage/products"><i class="fa fa-bullhorn"></i><span>Daftar Barang</span></a>
            </li> 

            <li class="{{ Request::is('manage/products/list-proposal*') ? 'active' : '' }}">
                <a href="/manage/products/list-proposal"><i class="fa fa-bullhorn"></i><span>Daftar Usulan</span></a>
            </li>            

            <li class="{{ Request::is('manage/orders*') ? 'active' : '' }}">
                <a href="/manage/orders"><i class="fa fa-shopping-cart"></i><span>Daftar Permintaan</span></a>
            </li>

            <hr>
            <li class="{{ Request::is('prosducts*') ? 'active' : '' }}">
                <a href="/manage/users"><i class="fa fa-users"></i><span>Users</span></a>
            </li>
<!--             <li class="{{ Request::is('prosducts*') ? 'active' : '' }}">
                <a href="/manage/roles"><i class="fa fa-car"></i><span>Roles</span></a>
            </li> -->
            @endrole

        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>