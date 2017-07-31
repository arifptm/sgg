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
                  <th>Tanggal</th>
                  <th>User</th>
                  <th>Nama Barang</th> 
                  <th>Status</th>
                  <th></th>
               </tr>
            </thead>
            <tbody>
               @foreach($orders as $order)
                  <tr>
                     <td>
                        {{ $order->id }}
                     </td>
                     <td>{{ $order->created_at->format('d-m-Y') }}</td>
                     <td>
                        {{ $order->user->name }}
                     </td>
                     <td>
                        <ul>
                           @foreach($order->lineitem as $lineitem)
                              <li>{{ $lineitem->product->title }} ({{ $lineitem->quantity }})</li>
                              
                           @endforeach
                        </ul>
                     </td>
                     <td> {{ $order->status }}</td>
                     <td>
                        @if($order->status == 'Active')
                           {!! Form::button('Proses',['class'=>'btn btn-primary btn-xs']) !!}
                        @endif
                     </td>
                     <td>
                        {!! Form::button('Proses',['class'=>'btn btn-xs btn-primary']) !!}
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

