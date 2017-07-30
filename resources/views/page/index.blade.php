@extends('layouts.app')


@section('content_title')
    <h1>Artikel</h1>
@endsection

@section('content')

        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'pages.store']) !!}

                        @include('pages.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>

@endsection
