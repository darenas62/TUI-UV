@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'calendars.store']) !!}

        @include('calendars.fields')

    {!! Form::close() !!}
</div>
@endsection
