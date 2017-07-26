@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    
    @foreach ($products as $product)
    	{{ $product->title }}
    @endforeach

    </div>
</div>
@endsection

