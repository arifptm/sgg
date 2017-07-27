@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        Daftar Barang
    </h1>

</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                
                <div class="box-body">
                    <table class="table table-bordered" id="products-table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                 <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>   

    <div class="row"><div class="col-md-12">
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Rencana permintaan</h3>
    </div>   

<div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>Nama Barang</th>
                  <th>Jumlah</th>
                  
                  
                  <th>Tanggal</th>
                  
                </tr>
@foreach($items as $item)
    <tr>
    <td> {{ $item->product->title }} </td>
    <td> {{ $item->quantity }} </td>
    <td> {{ $item->product->created_at }} </td>
    </tr>
@endforeach



              </tbody></table>
            </div>

<div class="box-footer clearfix">
<a href="{!! route('products.index') !!}" class="btn btn-primary">Proses permintaan</a>  <a href="{!! route('products.index') !!}" class="btn btn-default">Tambah permintaan lain</a>  
            </div>



</div>
</div>
</div>     

</section>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            {!! Form::open(['route' => 'lineitems.store']) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Permintaan baru</h4>
            </div>
            <div class="modal-body">
                <section class="content-header">
                    <h1 id="datatitle"></h1>
                </section>

                <div class="content">
            
                @include('adminlte-templates::common.errors')

                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="row">
                        
                                <div class="form-group col-sm-6">
                                    {!! Form::label('quantity', 'Jumlah permintaan:') !!}
                                    {!! Form::text('quantity', null, ['class' => 'form-control']) !!}
                                </div>    
                                {!! Form::hidden('product_id', '', ['id'=> 'dataid']) !!}

                                <div class="form-group col-sm-6">
                                    <span id="dataimage"></span>
                                </div>                
                            </div>
                        </div>
                    </div>
                 </div>
            </div>
            <div class="modal-footer">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary pull-left']) !!} 
                <a href="{!! route('products.index') !!}" class="btn btn-default">Tambah barang lainnya</a>  
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>



@endsection

@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<meta name="_token" content="{{ csrf_token() }}" />
@endsection

@section('scripts')
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
<script>

    $(function() {
        $('#products-table').DataTable({
            processing: true,
            serverSide: true,
            order: [ 0, "desc" ],
            ajax: '{!! route('products.data') !!}',
            columns: [
            { data: 'id', name: 'id' },
            { data: 'thumb', name: 'image' },
            { data: 'title', name: 'title' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
            { data: 'action', name: 'action',orderable: false, searchable: false }
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

