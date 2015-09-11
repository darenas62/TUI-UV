@extends('app')

@section('content')
<!-- app/views/nerds/show.blade.php -->
<div class="container">
<a class="btn btn-danger" style="margin-bottom: 20px;" href="{!! URL::to('/') !!}">Volver a las noticias académicas</a>
<h1>Viendo {{ $noticia->titulo }}</h1>
    <div class="jumbotron">
        <h2>{{ $noticia->titulo }}</h2>
        <p>{{ $noticia->contenido }}</p>
        <p>Publicado: {{ $noticia->created_at }}</p>
        <p>Actualizado: {{ $noticia->updated_at }}</p>
    </div>
</div>
</body>
</html> 
@endsection
