@extends('layouts.app')

@section('content_title')    
    <h1>{{ $product->title }}</h1>
@endsection

@section('content')    
	<div class="box">
		<div class="box-body">
    		<div class="row">
    			<div class="col-sm-5">
    				<img src="/images/large/{{ $product->image }}" alt="" class="img-responsive">
    			</div>
    			<div class="col-sm-7">
    			<table class='table table-responsive table-primary'>
    				<tbody>
    					<tr>
    						<th>Tanggal</th>
    						<td>{{ $product->created_at }}</td>
    					</tr>
    					<tr>
    						<th>Deskripsi</th>
    						<td>{{ $product->body }}</td>
    					</tr>
    					<tr>
    						<th>Website</th>
    						<td>{{ $product->url }}</td>
    					</tr>
    					<tr>
    						<th>Perkiraan harga</th>
    						<td>Rp. {{ $product->price }}</td>
    					</tr>
    				</tbody>
    			</table>
    			</div>
    		</div>
    	</div>
    </div>
@endsection
