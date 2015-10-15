<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TUI UV</title>
    {!! Html::style('assets/css/bootstrap.css') !!}
    {!! Html::style('assets/css/fullcalendar.min.css') !!}
    {!! Html::style('assets/css/fullcalendar.print.css') !!}
    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle Navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">TUI UV</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
            <li><a href="{!! URL::to('/') !!}">Inicio</a>
            @if (!Auth::guest())
              @if (Auth::user()->group == 1 | Auth::user()->group == 3)
              <li><a href="{!! URL::to('noticias/create') !!}">Publicar una noticia</a></li>
              @endif
            @endif
        </ul>
        <ul class="nav navbar-nav navbar-right">
            @if (Auth::guest())
                <li><a href="{{route('auth/login')}}">Acceder</a></li>

            @else
                    <li>
                        <a href="#">Bienvenido(a) @if(Auth::user()->group == 2) profesor(a) @endif{{ Auth::user()->name }}</a>
                    </li>
                    @if(Auth::user()->group == 1)
                      <li><a href="{{route('auth/register')}}">Registrar</a></li>
                    @endif
                    <li><a href="{{route('auth/logout')}}">Salir</a></li>
                    
              @endif
        </ul>
      </div>
    </div>
  </nav>
    <div class="container">
               @if (Session::has('errors'))
        <div class="alert alert-warning" role="alert">
      <ul>
              <strong>¡Oops! Algo salió mal : </strong>
          @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </div>
    @yield('content')
    <!-- Scripts -->
    {!! Html::script('assets/js/bootstrap.min.js') !!}
    {!! Html::script('assets/fullcalendar-2.4.0/fullcalendar.min.js') !!}
    {!! Html::script('assets/js/moment.js') !!}
    {!! Html::script('assets/js/jquery-2.1.4.min.js') !!}
    {!! Html::script('assets/js/jquery-ui.min') !!}
    <!-- Full calendar-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js">
    
    /*
      jQuery document ready
    */
    
    $(document).ready(function()
    {
      /*
        date store today date.
        d store today date.
        m store current month.
        y store current year.
      */
      var date = new Date();
      var d = date.getDate();
      var m = date.getMonth();
      var y = date.getFullYear();
      
      /*
        Initialize fullCalendar and store into variable.
        Why in variable?
        Because doing so we can use it inside other function.
        In order to modify its option later.
      */
      
      var calendar = $('#calendar').fullCalendar(
      {
        /*
          header option will define our calendar header.
          left define what will be at left position in calendar
          center define what will be at center position in calendar
          right define what will be at right position in calendar
        */
        header:
        {
          left: 'prev,next today',
          center: 'title',
          right: 'month,agendaWeek,agendaDay'
        },
        /*
          defaultView option used to define which view to show by default,
          for example we have used agendaWeek.
        */
        defaultView: 'agendaWeek',
        /*
          selectable:true will enable user to select datetime slot
          selectHelper will add helpers for selectable.
        */
        selectable: true,
        selectHelper: true,
        /*
          when user select timeslot this option code will execute.
          It has three arguments. Start,end and allDay.
          Start means starting time of event.
          End means ending time of event.
          allDay means if events is for entire day or not.
        */
        select: function(start, end, allDay)
        {
          /*
            after selection user will be promted for enter title for event.
          */
          var title = prompt('Event Title:');
          /*
            if title is enterd calendar will add title and event into fullCalendar.
          */
          if (title)
          {
            calendar.fullCalendar('renderEvent',
              {
                title: title,
                start: start,
                end: end,
                allDay: allDay
              },
              true // make the event "stick"
            );
          }
          calendar.fullCalendar('unselect');
        },
        /*
          editable: true allow user to edit events.
        */
        editable: true,
        /*
          events is the main option for calendar.
          for demo we have added predefined events in json object.
        */
        events: [
          {
            title: 'All Day Event',
            start: new Date(y, m, 1)
          },
          {
            title: 'Long Event',
            start: new Date(y, m, d-5),
            end: new Date(y, m, d-2)
          },
          {
            id: 999,
            title: 'Repeating Event',
            start: new Date(y, m, d-3, 16, 0),
            allDay: false
          },
          {
            id: 999,
            title: 'Repeating Event',
            start: new Date(y, m, d+4, 16, 0),
            allDay: false
          },
          {
            title: 'Meeting',
            start: new Date(y, m, d, 10, 30),
            allDay: false
          },
          {
            title: 'Lunch',
            start: new Date(y, m, d, 12, 0),
            end: new Date(y, m, d, 14, 0),
            allDay: false
          },
          {
            title: 'Birthday Party',
            start: new Date(y, m, d+1, 19, 0),
            end: new Date(y, m, d+1, 22, 30),
            allDay: false
          },
          {
            title: 'Click for Google',
            start: new Date(y, m, 28),
            end: new Date(y, m, 29),
            url: 'http://google.com/'
          }
        ]
      });
      
    });

  </script>
</body>
</html>
