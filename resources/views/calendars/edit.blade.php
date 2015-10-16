@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($calendar, ['route' => ['calendars.update', $calendar->id], 'method' => 'patch']) !!}

        @include('calendars.fields')

    {!! Form::close() !!}
</div>
@endsection
