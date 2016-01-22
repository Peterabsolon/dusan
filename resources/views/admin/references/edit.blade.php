@extends($layout)

@section('content-header')
	<h1>
		Edit
		&middot;
		<small>{!! link_to_route('admin.references.index', 'Back') !!}</small>
	</h1>
@stop

@section('content')

	<div>
		@include('admin.references.form', array('model' => $reference))
	</div>

@stop
