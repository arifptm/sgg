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
                  <th>Stok</th>
                  <th></th>
               </tr>
            </thead>
         </table>
      </div>
   </div>
@endsection

@if(count($items) != 0)
   @section('content_right') 
      <div class="box">
         <div class="box-header with-border">
            <h3 class="box-title">Rencana permintaan</h3>
         </div>   

         <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
               <tbody>
                  <tr>
                     <th>No.</th>
                     <th>Nama Barang</th>
                     <th>Jumlah</th>                  
                  </tr>
                  @foreach($items->lineitem as $key=>$item)
                     <tr>
                        <td> {{ $key+1 }} </td>
                        <td> {{ $item->product->title }} </td>
                        <td> {{ $item->quantity }} </td>
                     </tr>
                  @endforeach
               </tbody>
            </table>
         </div>

         <div class="box-footer clearfix">
            {!! Form::open(['action'=> 'OrderController@checkout']) !!}
            {!! Form::hidden('id', $items->id) !!}
            {!! Form::button('Batal',['type'=>'submit', 'class'=>'btn btn-danger pull-right']) !!}          
            {!! Form::close() !!}      

            {!! Form::open(['action'=> 'OrderController@checkout']) !!}
            {!! Form::hidden('id', $items->id) !!}
            {!! Form::button('Proses',['type'=>'submit', 'class'=>'btn btn-primary']) !!}          
            {!! Form::close() !!}
         </div>
      </div>       
   @endsection
@endif



@section('css')
@endsection

@section('f_scripts')
<script>
 $(function() {
  $('#products-table').DataTable({
   processing: true,
   serverSide: true,
   responsive: true,
   lengthChange: false,
   autoWidth   : false,
   order: [ 0, "desc" ],
   ajax: '{!! route('products.data') !!}',
   columns: [
   { data: 'id', name: 'id' },
   { data: 'thumb', name: 'thumb',orderable: false, searchable: false },
   { data: 'title_a', name: 'title' },
   { data: 'body', name: 'body',orderable: false, searchable: false },
   { data: 'stock', name: 'stock' }, 
   { data: 'edit', name: 'edit',orderable: false, searchable: false }
   ]
});

  $('#myModal').on("show.bs.modal", function (e) {
    $("#datatitle").html($(e.relatedTarget).data('datatitle'));
    $("#dataimage").html($(e.relatedTarget).data('dataimage'));
    $("#dataid").attr( 'value', ($(e.relatedTarget).data('dataid')));
 });
});

</script>
@endsection

