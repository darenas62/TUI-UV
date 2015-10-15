@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'suspensis.store']) !!}

        @include('suspensis.fields')

    {!! Form::close() !!}
</div>
@endsection
