@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">suspension</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('suspensis.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($suspensis->isEmpty())
                <div class="well text-center">No suspensis found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Ramo</th>
			<th>Motivo</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($suspensis as $suspensi)
                        <tr>
                            <td>{!! $suspensi->ramo !!}</td>
					<td>{!! $suspensi->motivo !!}</td>
                            <td>
                                <a href="{!! route('suspensis.edit', [$suspensi->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('suspensis.delete', [$suspensi->id]) !!}" onclick="return confirm('Are you sure wants to delete this suspensi?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection