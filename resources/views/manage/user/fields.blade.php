    <div class="form-group col-sm-12">
        {!! Form::label('name', 'Nama:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    @role('admin||super')
    <div class="form-group col-sm-12">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
    </div>
    @endrole

    <div class="form-group col-sm-12">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group col-sm-12">
        {!! Form::label('password', 'Ulangi password:') !!}
        {!! Form::password('password',['class' => 'form-control']) !!}
    </div>

    <div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{!! route('users.list') !!}" class="btn btn-default">Batal</a>
    </div>    