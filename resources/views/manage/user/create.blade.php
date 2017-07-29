@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-sm-8 col-lg-6">
    <section class="content-header">
        <h1>Tambah User</h1>
    </section>

    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'users.store']) !!}

                        @include('manage.user.fields')

                    {!! Form::close() !!}
                </div>
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
