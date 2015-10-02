@extends('app')
 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Registrar</div>
 
                <div class="panel-body">
                    {!! Form::open(['route' => 'auth/register', 'class' => 'form']) !!}

                        <div class="form-group">
                            <label>RUN</label>
                            {!! Form::input('number', 'run', '', ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Nombre</label>
                            {!! Form::input('text', 'name', '', ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Correo</label>
                            {!! Form::email('email', '', ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            {!! Form::password('password', ['class'=> 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <label>Confirmar contraseña</label>
                            {!! Form::password('password_confirmation', ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Group</label>
                            {!! Form::select('group', [
                            1  =>  'Administrador',
                            2  =>  'Profesor',
                            3  =>  'Secretaria',
                            4  =>  'Estudiante'
                            ], null, ['class'=> 'form-control']) !!}
                        </div>

                        <div>
                            {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
