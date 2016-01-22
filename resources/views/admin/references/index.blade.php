@extends($layout)

@section('content-header')
	<h1>
		All References ({!! $references->count() !!})
		&middot;
		<small>{!! link_to_route('admin.references.create', 'Add New') !!}</small>
	</h1>
@stop

@section('content')

	<table class="table">
		<thead>
			<th>No</th>
			<th>Title</th>
			<th>Author</th>
			<th>Created At</th>
			<th class="text-center">Action</th>
		</thead>
		<tbody>
			@foreach ($references as $reference)
			<tr>
				<td>{!! $no !!}</td>
				<td>{!! $reference->title !!}</td>
				<td>{!! $reference->user->name !!}</td>
				<td>{!! $reference->created_at !!}</td>
				<td class="text-center">
					<a href="{!! route('admin.references.edit', $reference->id) !!}">Edit</a>
					&middot;
					@include('admin::partials.modal', ['data' => $reference, 'name' => 'references'])
				</td>
			</tr>
			<?php $no++ ;?>
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{!! pagination_links($references) !!}
	</div>
@stop
