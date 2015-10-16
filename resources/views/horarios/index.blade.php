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
    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Horarios</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('horarios.create') !!}">Add New</a>
        </div>
        <div id='calendar'></div>
<script>
@if ($id = 0) @endif
    $(document).ready(function() {
        
        $('#calendar').fullCalendar({
            header: {
                left: '',
                center: 'title',
                right: 'agendaWeek'
            },
            firstDay: 1,
            editable: false,
            eventLimit: true, // allow "more" link when too many events
            defaultView: 'agendaWeek', // allow "more" link when too many events
            timeFormat: 'H:mm',
            hiddenDays: [ 6, 0],
            handleWindowResize: true,
            minTime: '08:00:00',
            maxTime: '20:00:00',
            events: [
                @foreach($horarios as $horario)
                    {title: '{!! $horario->title !!}', dow: [{!! $horario->dow !!}], start: '{!! $horario->start !!}', end: '{!! $horario->end !!}'},
                @endforeach
            ]
        });
        
    });

</script>
        <div class="row">
            @if($horarios->isEmpty())
                <div class="well text-center">No Horarios found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Title</th>
			<th>Dow</th>
			<th>Start</th>
			<th>End</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($horarios as $horario)
                        <tr>
                            <td>{!! $horario->title !!}</td>
					<td>{!! $horario->dow !!}</td>
					<td>{!! $horario->start !!}</td>
					<td>{!! $horario->end !!}</td>
                            <td>
                                <a href="{!! route('horarios.edit', [$horario->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('horarios.delete', [$horario->id]) !!}" onclick="return confirm('Are you sure wants to delete this Horario?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
