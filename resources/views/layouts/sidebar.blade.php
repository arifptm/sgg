
<aside class="main-sidebar" id="sidebar-wrapper">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="http://infyom.com/images/logo/blue_logo_150x150.jpg" class="img-circle"
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
            @role('user||super||admin')
            <li class="{{ Request::is('products*') ? 'active' : '' }}">
                <a href="{!! route('products.create') !!}"><i class="fa fa-edit"></i><span>Usulan</span></a>
            </li>

            <li class="{{ Request::is('lineitems*') ? 'active' : '' }}">
                <a href="{!! route('lineitems.create') !!}"><i class="fa fa-car"></i><span>Permintaan</span></a>
            </li>
            @endrole

            @role('admin|super')
            <hr>
            <li class="{{ Request::is('manage.products*') ? 'active' : '' }}">
                <a href="/manage/products"><i class="fa fa-car"></i><span>Barang</span></a>
            </li>

            <li class="{{ Request::is('produscts*') ? 'active' : '' }}">
                <a href="/manage/users"><i class="fa fa-car"></i><span>Daftar Permintaan</span></a>
            </li>

            <li class="{{ Request::is('prodsucts*') ? 'active' : '' }}">
                <a href="/manage/users"><i class="fa fa-car"></i><span>Daftar Usulan</span></a>
            </li>
            @endrole

            @role('super')
            <hr>
            <li class="{{ Request::is('prosducts*') ? 'active' : '' }}">
                <a href="/manage/users"><i class="fa fa-car"></i><span>Users</span></a>
            </li>
            <li class="{{ Request::is('prosducts*') ? 'active' : '' }}">
                <a href="/manage/roles"><i class="fa fa-car"></i><span>Roles</span></a>
            </li>
            @endrole

        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>