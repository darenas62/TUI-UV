@extends('app')

@section('content')
<head>
<meta charset='utf-8' />
<link href='assets/fullcalendar-2.4.0/fullcalendar.css' rel='stylesheet' />
<link href='assets/fullcalendar-2.4.0/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='assets/fullcalendar-2.4.0/lib/moment.min.js'></script>
<script src='assets/fullcalendar-2.4.0/lib/jquery.min.js'></script>
<script src='assets/fullcalendar-2.4.0/fullcalendar.min.js'></script>
<script src='assets/fullcalendar-2.4.0/lang/es.js'></script>

<style>

    body {
        margin: 40px 10px;
        padding: 0;
        font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
        font-size: 14px;
    }

    #calendar {
        max-width: 900px;
        margin: 0 auto;
    }

</style>
</head>
<body>

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Calendario</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('calendars.create') !!}">Nueva</a>
        </div>

        <div id='calendar'></div>
<script>
@if ($id = 0) @endif
    $(document).ready(function() {
        
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            firstDay: 1,
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            dayClick: function(date, jsEvent, view) {
                location.href = '{!! route('calendars.create') !!}?date=' + date.format('YYYY-MM-DD');
            },
            events: [
                @foreach($calendars as $calendar)
                    {id: {!! $id++ !!}, title: '{!! $calendar->title !!}', start: '{!! $calendar->date !!}'},
                @endforeach
            ]
        });
        
    });

</script>
        <div class="row">
            @if($calendars->isEmpty())
                <div class="well text-center">No hay fechas de evaluaciones.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Título</th>
			        <th>Fecha</th>
                    <th width="50px">Acción</th>
                    </thead>
                    <tbody>
                     
                    <script>
                    @foreach($calendars as $calendar)

                    </script>
                        <tr>
                            <td>{!! $calendar->title !!}</td>
					<td>{!! $calendar->date !!}</td>
                            <td>
                                <a href="{!! route('calendars.edit', [$calendar->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('calendars.delete', [$calendar->id]) !!}" onclick="return confirm('Are you sure wants to delete this Calendar?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
