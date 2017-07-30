@extends('layouts.app')

@section('content_title')
    <h1>
        Daftar User <span class="pull-right">{!! link_to('/manage/users/create', 'Tambar User', ['class'=>'btn btn-primary text-right']) !!}</span>
    </h1>
@endsection


@section('content')
    <div class="box">
        <div class="box-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama User</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Permission</th>
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
                        <td>
                            {{ $user->email }}
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
                            {!! Form::open(['route' => ['manage.users.destroy', $user->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{!! route('manage.users.show', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                                <a href="{!! route('manage.users.edit', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                            </div>
                            {!! Form::close() !!}
 
                        </td>                                
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection    