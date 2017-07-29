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
