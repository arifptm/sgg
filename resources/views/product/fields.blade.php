
    <div class="form-group col-sm-12">
        {!! Form::label('title', 'Nama barang:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>

<!--     @role('admin|super')
    <div class="form-group col-sm-12">
        {!! Form::label('register_date', 'Tanggal masuk:') !!}
        {!! Form::date('register_date', !empty($product) ? Carbon\Carbon::parse($product->register_date)->format('Y-m-d') : null, ['class' => 'form-control']) !!}
    </div>
    @endrole -->

    <div class="form-group col-sm-3">
        {!! Form::label('image', 'Gambar:') !!}
        {!! Form::file('image', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group col-sm-9">
        {!! Form::label('body', 'Deskripsi:') !!}
        {!! Form::textarea('body', null , ['class' => 'form-control', 'rows' => '5']) !!}
    </div>

    <div class="form-group col-sm-6">
        {!! Form::label('url', 'Link:') !!}
        {!! Form::url('url', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group col-sm-6">
        {!! Form::label('price', 'Perkiraan harga:') !!}
        {!! Form::number('price', null, ['class' => 'form-control']) !!}
    </div>

    @role('admin|super')
    <div class="form-group col-sm-6">
        {!! Form::label('placement', 'Penempatan:') !!}
        {!! Form::text('placement', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group col-sm-12">
           
            {!! Form::label('disposable', 'Habis pakai ?') !!}
            
            <label class="radio-inline"> 
                {!! Form::radio('disposable', "1", null,['class'=>'flat-blue'] ) !!} Ya
            </label>
            

            <label class="radio-inline"> 
                {!! Form::radio('disposable', "0", null, ['class'=>'flat-blue']) !!} Tidak
            </label>
            
    </div>

    <div class="form-group col-sm-6">
        {!! Form::label('stock', 'Stok:') !!}
        {!! Form::number('stock', null, ['class' => 'form-control']) !!}
    </div>
    @endrole

    <div class="form-group col-sm-12">
        {!! Form::hidden('user_id', Auth::id()) !!}
        {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
        <a href="{!! route('products.index') !!}" class="btn btn-default">Batal</a>
    </div>
