@extends('app')

@section('content')
<!-- app/views/nerds/create.blade.php -->
<div class="container">
<h1>Publicar una noticia</h1>

<!-- if there are creation errors, they will show here -->
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

{!! Form::open(array('url' => 'noticias')) !!}

    <div class="form-group">
        {!! Form::label('titulo', 'Titulo') !!}
        {!! Form::text('titulo', Input::old('titulo'), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('contenido', 'Mensaje') !!}
        {!! Form::textarea('contenido', null, 
                array('required', 
                      'class'=>'form-control', 
                      'placeholder'=>'Ingrese su mensaje aqui')) !!}
    </div>

    {!! Form::submit('Publicar!', array('class' => 'btn btn-primary')) !!}

{!! Form::close() !!}

</div>
@endsection
