
<div class="col-sm-6">
    @role('admin|super')

    <div class="form-group col-sm-12">   
        {!! Form::label('Verifikasi', 'Verifikasi: ') !!}              
        <label class="radio-inline"> 
              
            {!! Form::radio('verified', "1", null,['class'=>'accept', 'id'=>'openme', ($product->getOriginal('verified') == 1) ? 'checked' : '']  ) !!} Terima
         </label>           
        <label class="radio-inline"> 
            {!! Form::radio('verified', "0", null, ['class'=>'reject', ($product->getOriginal('verified') == 0) ? 'checked' : '' ]) !!} Tolak
        </label>    
            <label class="radio-inline"> 
            {!! Form::radio('verified', '9', null, ['class'=>'notverified', ($product->getOriginal('verified') == 9) ? 'checked' : '' ]) !!} Belum
        </label>         
    </div>

    <div id="showme" class="{{ $product->verified == 1 ? '' : 'hidden' }}">
       
        <div class="form-group col-sm-12"> <hr/>          
            {!! Form::label('disposable', 'Habis pakai ?') !!}           
            <label class="radio-inline"> 
                {!! Form::radio('disposable', "1", null,['class'=>'dispos'] ) !!} Ya
             </label>           
            <label class="radio-inline"> 
                {!! Form::radio('disposable', "0", null, ['class'=>'dispos']) !!} Tidak
            </label>            
        </div>        
        <div class="form-group col-sm-12">
            {!! Form::label('placement', 'Penempatan:') !!}
            {!! Form::text('placement', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-sm-12">
            {!! Form::label('stock', 'Stok:') !!}
            {!! Form::number('stock', null, ['class' => 'form-control']) !!}
        </div>
    

    </div>
    @endrole
</div>

<div class="col-sm-6">
    <div class="form-group col-sm-12">
        {!! Form::label('title', 'Nama barang:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>

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
</div>


    <div class="form-group col-sm-12">
        @if (isset($id))
            {!! Form::hidden('user_id', $id) !!}
        @endif
        
        {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
        <a href="{!! route('products.index') !!}" class="btn btn-default">Batal</a>
    </div>
