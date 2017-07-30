@extends('layouts.app')

@section('content_title')
   <h1>Daftar Barang</h1>
@endsection

@section('content')    
   <div class="box">              
      <div class="box-body">
         <table class="table table-bordered" id="products-table">
            <thead>
               <tr>
                  <th>Id</th>
                  <th>Gambar</th>
                  <th>Nama Barang</th> 
                  <th>Deskripsi</th>                       
                  <th>Oleh</th>
                  <th></th>
               </tr>
            </thead>
            <tbody>
               @foreach($products as $product)
                  <tr>
                     <td>
                        {{ $product->id }}
                     </td>
                     <td>
                        <img src="/images/tiny/{{ $product->image }}" alt="">
                     </td>
                     <td>
                        {{ $product->title }}
                     </td>
                     <td>
                        {{ $product->body }}
                     </td>
                     <td>
                        {{ $product->user->name }}
                     </td>   
                     <td>
                        {!! link_to( 'manage/products/'.$product->id.'/edit', 'Proses', ['class'=>'btn btn-primary btn-xs']) !!}
                     </td>

                  </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
@endsection

@section('css')
@endsection

@section('f_scripts')
@endsection

