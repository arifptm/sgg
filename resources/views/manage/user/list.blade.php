@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-sm-8 col-lg-6">
<section class="content-header">
    <h1>
        Daftar User <span class="pull-right">{!! link_to('/manage/users/create', 'Tambar User', ['class'=>'btn btn-primary text-right']) !!}</span>
    </h1>

</section>

<section class="content">

            <div class="box">              
                <div class="box-body">
                    <table class="table table-bordered" id="products-table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nama User</th>
                                <th>Role</th>
                                <th>Permission At</th>
                                 <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>
                                    {{ $user->id }}
                                </td>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td><ul>
                                    @foreach ($user->roles as $role)
                                        <li>{{ $role->name }}</li>
                                    @endforeach</ul>
                                </td>
                                <td><ul>
                                    @foreach ($user->permissions as $permission)
                                        <li>{{ $permission->name }}</li>
                                    @endforeach</ul>
                                </td> 
                                <td>
                                    {{ $user->id }}
                                </td>                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

</section>
</div>
</div>
@endsection    