@extends('layouts.app')


@section('content_title')
    <h1>Usulan barang baru</h1>
@endsection

@section('content')
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'products.store', 'files' => true]) !!}

                        @include('product.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
@endsection

@section('content_right')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Riwayat Usulan</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-sm-12">
                    <ul>
                        @foreach($products as $product)
                            <li><small>{{ $product -> created_at }}</small> | {!! link_to('/products/'.$product->id, $product->title) !!}<br><small>Status: 
                            {{ ($product->verified == '0') ? 'asd' : 'as' }}</small> </td></li>
                        @endforeach
                    </ul>    
                </div>
            </div>
        </div>        
    </div>
@endsection

