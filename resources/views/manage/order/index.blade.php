@extends('layouts.app')

@section('content_title')
   <h1>Daftar Permintaan</h1>
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
               @foreach($orders as $order)
                  <tr>
                     <td>
                        {{ $order->id }}
                     </td>
<!--  -->

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

