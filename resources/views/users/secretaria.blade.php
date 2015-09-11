@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading"><h4>Ingresar noticia academica</h4></div>

        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

        {!! Form::open(array('route' => 'secretaria', 'class' => 'form')) !!}

        <div class="form-group">
            {!! Form::label('Titulo') !!}
            {!! Form::text('titulo', null, 
                array('required', 
                      'class'=>'form-control', 
                      'placeholder'=>'Ingrese el titulo de la noticia')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('mensaje') !!}
            {!! Form::textarea('contenido', null, 
                array('required', 
                      'class'=>'form-control', 
                      'placeholder'=>'Ingrese su mensaje aqui')) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Publicar!', 
              array('class'=>'btn btn-primary')) !!}
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection
