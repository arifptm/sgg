@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Create Product
        </h1>
    </section>

    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'products.store', 'files' => true]) !!}

                        @include('lineitem.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
