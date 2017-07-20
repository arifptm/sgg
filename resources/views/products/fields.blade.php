<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Register Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('register_date', 'Register Date:') !!}
    {!! Form::text('register_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Body Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('body', 'Body:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Image:') !!}
    {!! Form::file('image') !!}
</div>
<div class="clearfix"></div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Placement Field -->
<div class="form-group col-sm-6">
    {!! Form::label('placement', 'Placement:') !!}
    {!! Form::text('placement', null, ['class' => 'form-control']) !!}
</div>

<!-- Disposable Field -->
<div class="form-group col-sm-12">
    {!! Form::label('disposable', 'Disposable:') !!}
    <label class="radio-inline">
        {!! Form::radio('disposable', "Yes", null) !!} Yes
    </label>

    <label class="radio-inline">
        {!! Form::radio('disposable', "No", null) !!} No
    </label>

</div>

<!-- Stock Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stock', 'Stock:') !!}
    {!! Form::number('stock', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('products.index') !!}" class="btn btn-default">Cancel</a>
</div>
