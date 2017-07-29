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
                                <th>Role</th>
                                <th>Role</th>
                                <th>Permission At</th>
                                 <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                            <tr>
                                <td>
                                    {{ $role->id }}
                                </td>
                                <td>
                                    {{ $role->name }}
                                </td>
                                <td>
                                    @foreach($role->permissions as $permission)
                                        {{ $permission->name }}<br>
                                    @endforeach
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