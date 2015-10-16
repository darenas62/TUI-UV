@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($horario, ['route' => ['horarios.update', $horario->id], 'method' => 'patch']) !!}

        @include('horarios.fields')

    {!! Form::close() !!}
</div>
@endsection
