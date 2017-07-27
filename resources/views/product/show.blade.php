@extends('layouts.app')

@section('content')
    
    <section class="content-header">
        <h1>
            {{ $product->title }}
        </h1>
    </section>
<div class="box">
    <div class="content">
    <img src="/images/large/{{ $product->image }}" alt="">
    </div>
    </div>
@endsection
