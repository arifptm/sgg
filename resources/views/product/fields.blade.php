<div class="col-md-9">
    <div class="form-group col-sm-12">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>

    @role('admin||super')
    <div class="form-group col-sm-12">
        {!! Form::label('register_date', 'Register Date:') !!}
        {!! Form::text('register_date', null, ['class' => 'form-control']) !!}
    </div>
    @endrole

    <div class="form-group col-sm-3">
        {!! Form::label('image', 'Image:') !!}
        {!! Form::file('image') !!}
    </div>

    <div class="form-group col-sm-9">
        {!! Form::label('body', 'Body:') !!}
        {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => '5']) !!}
    </div>

    <div class="form-group col-sm-6">
        {!! Form::label('url', 'URL:') !!}
        {!! Form::text('url', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group col-sm-6">
        {!! Form::label('price', 'Price:') !!}
        {!! Form::text('price', null, ['class' => 'form-control']) !!}
    </div>

    @role('admin||super')
    <div class="form-group col-sm-6">
        {!! Form::label('placement', 'Placement:') !!}
        {!! Form::text('placement', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group col-sm-12">
        {!! Form::label('disposable', 'Disposable:') !!}
        <label class="radio-inline">
            {!! Form::radio('disposable', "Yes", null) !!} Yes
        </label>

        <label class="radio-inline">
            {!! Form::radio('disposable', "No", null) !!} No
        </label>

    </div>

    <div class="form-group col-sm-6">
        {!! Form::label('stock', 'Stock:') !!}
        {!! Form::number('stock', null, ['class' => 'form-control']) !!}
    </div>
    @endrole

    <div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{!! route('products.index') !!}" class="btn btn-default">Cancel</a>
    </div>
</div>