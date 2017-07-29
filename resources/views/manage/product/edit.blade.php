@extends('layouts.app')

@section('content_title')
  <h1>Edit Barang</h1>
@endsection

@section('content')
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($product, ['route' => ['manage.products.update', $product->id], 'method' => 'patch', 'files' => 'true']) !!}

                        @include('product.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection