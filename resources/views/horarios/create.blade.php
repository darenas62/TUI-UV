@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'horarios.store']) !!}

        @include('horarios.fields')

    {!! Form::close() !!}
</div>
@endsection
