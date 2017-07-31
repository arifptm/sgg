@extends('layouts.app')

@section('content_title')
  <h1>Edit Barang</h1>
@endsection

@section('content')
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($product, ['route' => ['manage.products.update', $product->id], 'method' => 'patch', 'files' => 'true']) !!}

                        @include('manage.product.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
@endsection

@section('f_scripts')
<script>
  $(document).ready(function(){
    $('input.accept').on('ifChecked ifClicked', function(event){
      $('#showme').fadeIn('slow');
    }).iCheck({
      radioClass   : 'iradio_flat-blue'
    })

    $('input.reject,input.notverified').on('ifChecked ifClicked', function(event){
      $('#showme').hide();
    }).iCheck({
      radioClass   : 'iradio_flat-blue'
    })

    $('input#disposable').iCheck({
      radioClass   : 'iradio_flat-blue'
    })
  });  



</script>    
@endsection