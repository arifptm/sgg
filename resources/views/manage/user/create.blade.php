@extends('layouts.app')

@section('content_title')
    <h1>Tambah User</h1>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">           
                <div class="row">
                    {!! Form::open(['route' => 'manage.users.store']) !!}
                        @include('manage.user.fields')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>     
@endsection

@section('f_scripts')
    <script>
        $(document).ready(function(){
            $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass   : 'iradio_flat-blue'
            });
        });
    </script>
@endsection
