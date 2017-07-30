@extends('layouts.app')

@section('content_title')
    <h1>{{ $user->name }}</h1>
@endsection

@section('content')    
	<div class="box">
		<div class="box-body">
    		<div class="row">
    			<div class="col-sm-5">
    				<img src="/images/large/{{ $user->image }}" alt="" class="img-responsive">
    			</div>
    			<div class="col-sm-7">
    			<table class='table table-responsive table-primary'>
    				<tbody>
    					<tr>
    						<th>Tanggal</th>
    						<td>{{ $user->created_at }}</td>
    					</tr>
    					<tr>
    						<th>Nama</th>
    						<td>{{ $user->name }}</td>
    					</tr>
    					<tr>
    						<th>Role</th>
    						<td>
    							@foreach($user->roles as $role)
    								{{ $role->name }}
    							@endforeach
    						</td>
    					</tr>
    				</tbody>
    			</table>
    			</div>
    		</div>
    	</div>
    	<div class="box-footer">
    		{!! link_to('/manage/'.$user->id.'/edit', 'Edit', ['class'=>'btn btn-primary']) !!}
    		{!! link_to( route('manage.users.list'), 'Batal', ['class'=>'btn btn-default']) !!}
    	</div>
    </div>
@endsection




