@extends('app')

@section('content')
<!-- app/views/nerds/edit.blade.php -->
<div class="container">
<h1>Editando {{ $noticia->titulo }}</h1>

<!-- if there are creation errors, they will show here -->
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
{!! Form::model($noticia, array('route' => array('noticias.update', $noticia->id), 'method' => 'PUT')) !!}

    <div class="form-group">
        {!! Form::label('titulo', 'Titulo') !!}
        {!! Form::text('titulo', null, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('contenido', 'Mensaje') !!}
        {!! Form::textarea('contenido', null, 
                array('required', 
                      'class'=>'form-control', 
                      'placeholder'=>'Ingrese su mensaje aqui')) !!}
    </div>


    {!! Form::submit('Editar la noticia!', array('class' => 'btn btn-primary')) !!}

{!! Form::close() !!}

</div>
@endsection

