@extends('app')

@section('content')

<h1>About me:</h1>
@if (count($people))
<h3> People i like: </h3>
<ul>
	@foreach ($people as $person)
		<li>{{ $person }}</li>
	@endforeach
</ul>
@endif
<p>

	Lorem ipsum dolor sit amet

</p>
@stop


