@extends('app')

@section('content')

<div class="container">
    @if (!Auth::guest())
      @if (Auth::user()->group == 1)
      <!-- Estudiante -->
      <div class="panel panel-primary">
        <div class="panel-heading">Panel Administrador</div>

        <div class="panel-body">
          <p>
            <b>Bienvenido {{Auth::user()->name}}</b>
          </p>
          <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>
          <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Donec rutrum congue leo eget malesuada. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Donec rutrum congue leo eget malesuada.</p>
        </div>
      </div>
      @endif
      @if (Auth::user()->group == 4)
      <!-- Estudiante -->
      <!-- Crear un if para que esto se muestre sólo si hay notificaciones-->
      <div class="panel panel-primary">
        <div class="panel-heading">Notificaciones</div>
        <div class="panel-body">
          <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>
          <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Donec rutrum congue leo eget malesuada. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Donec rutrum congue leo eget malesuada.</p>
        </div>
      </div>
      <!-- FIN NOTIFICACIONES -->
      <!-- Horario -->
      
       <div id='calendar'></div>
      <!-- FIN HORARIO -->
      @endif
      @if (Auth::user()->group == 3)
      <!-- Secretaria -->
      <div class="panel panel-primary">
        <div class="panel-heading">Panel Secretaria</div>

        <div class="panel-body">
          <p>
            <b>Bienvenido {{Auth::user()->name}}</b>
          </p>
          <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>
          <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Donec rutrum congue leo eget malesuada. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Donec rutrum congue leo eget malesuada.</p>
        </div>
      </div>
      @endif
            @if (Auth::user()->group == 2)
      <!-- Profesor -->
      <div class="panel panel-primary">
        <div class="panel-heading">Notificaciones</div>
        <div class="panel-body">

          <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>
          <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Donec rutrum congue leo eget malesuada. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Donec rutrum congue leo eget malesuada.</p>
        </div>
      </div>
      @endif
    @endif
    <h1>Noticias académicas</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Titulo</td>
            <td>Contenido</td>
            @if (!Auth::guest())
              @if (Auth::user()->group == 1 | Auth::user()->group == 3)
                <td>Acciones</td>
              @endif
            @endif
        </tr>
    </thead>
    <tbody>
    @foreach($noticias as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>
                <a href="{{ URL::to('noticias/' . $value->id) }}">
                    {{ $value->titulo }}
                </a>
            </td>
            <td>{{ $value->contenido }}</td>

            @if (!Auth::guest())
              @if (Auth::user()->group == 1 | Auth::user()->group == 3)
                <!-- we will also add show, edit, and delete buttons -->
                <td>

                    <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->
                    {!! Form::open(array('url' => 'noticias/' . $value->id, 'class' => 'pull-right')) !!}
                        {!! Form::hidden('_method', 'DELETE') !!}
                        {!! Form::submit('Borrar esta noticia', array('class' => 'btn btn-warning')) !!}
                    {!! Form::close() !!}
                    <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                    <a class="btn btn-small btn-success" href="{{ URL::to('noticias/' . $value->id) }}">Ver esta noticia</a>

                    <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ URL::to('noticias/' . $value->id . '/edit') }}">Editar esta noticia</a>

                </td>
              @endif
            @endif
        </tr>
    @endforeach
    </tbody>
</table>
</div>
 <script>

  // Handle the form submission

  function notifyInit() {
    var pusher = new Pusher("{{env("PUSHER_KEY")}}");
    var channel = pusher.subscribe('canal-suspension');
    channel.bind('evento-suspension', function(data) {
      notifySuccess(data);
    });
    // Ensure the normal browser event doesn't take place
    /*function showNotification(data) {
        
        return true;
    }*/

  }
  function notifySuccess(data) {
    //console.log('notification submitted');
    toastr.success(data.text, "Desarrollo Web", {"positionClass": "toast-bottom-left"});
  }
  $(notifyInit);

</script>


@endsection
