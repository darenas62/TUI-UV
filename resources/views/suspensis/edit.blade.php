@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($suspensi, ['route' => ['suspensis.update', $suspensi->id], 'method' => 'patch']) !!}

        @include('suspensis.fields')

    {!! Form::close() !!}
</div>
@endsection
