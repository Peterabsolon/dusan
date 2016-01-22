@if(isset($model))
{!! Form::model($model, ['method' => 'PUT', 'files' => true, 'route' => ['admin.references.update', $model->id]]) !!}
@else
{!! Form::open(['files' => true, 'route' => 'admin.references.store']) !!}
@endif
	<div class="form-group">
		{!! Form::label('title', 'Title:') !!}
		{!! Form::text('title', null, ['class' => 'form-control']) !!}
		{!! $errors->first('title', '<div class="text-danger">:message</div>') !!}
	</div>
	<div class="form-group">
		{!! Form::label('body', 'Body:') !!}
		{!! Form::textarea('body', null, ['class' => 'form-control summernote']) !!}
		{!! $errors->first('body', '<div class="text-danger">:message</div>') !!}
	</div>
	<div class="form-group">
		{!! Form::label('sort_order', 'Sort order:') !!}
		{!! Form::text('sort_order', null, ['class' => 'form-control']) !!}
		{!! $errors->first('sort_order', '<div class="text-danger">:message</div>') !!}
	</div>	

	<div class="form-group">
		{!! Form::label('photos', 'Photos:') !!}
		<div class="well well-photos">
			<div class="photos">
				<?php $photo_key = 0; ?>
				@if (isset($model) && $model->photos)
					@foreach ($model->photos as $photo)
						<div class="panel panel-default">
							<div class="panel-body">
								<div class="img-thumbnail">
									<img src="{!! asset('images/photos/' . $photo->image) !!}" class="img-responsive">
								</div>
								<input type="file" name="photos[]" class="input-file" id="file-photo-{{ $photo_key }}">
								<label for="file-photo-{{ $photo_key }}" class="btn btn-primary btn-upload"><i class="fa fa-upload"></i> <span>Choose a file</span></label>
								<button type="button" class="btn btn-danger btn-entry-delete" data-type="photo"><i class="fa fa-close"></i></button>
							</div>
						</div>
					@endforeach
				@endif
			</div>
			<button type="button" class="btn btn-success btn-entry-add" data-type="photo"><i class="fa fa-plus"></i> Add photo</button>			
		</div>
	</div>


	<div class="form-group">
		{!! Form::submit(isset($model) ? 'Update' : 'Save', ['class' => 'btn btn-primary']) !!}
	</div>
{!! Form::close() !!}

@section('script')

	<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.7.1/summernote.css" rel="stylesheet">
	<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.7.1/summernote.js"></script>
	
	<script type="text/javascript">
		function enableFileButtons() {
			var inputs = document.querySelectorAll( '.input-file' );
			Array.prototype.forEach.call( inputs, function( input )
			{
				var label	 = input.nextElementSibling,
					labelVal = label.innerHTML;

				input.addEventListener('change', function( e )
				{
					var fileName = '';
					
					fileName = e.target.value.split( '\\' ).pop();

					if( fileName )
						label.querySelector( 'span' ).innerHTML = fileName;
					else
						label.innerHTML = labelVal;
				});
			});		
		}

		enableFileButtons();

		$(document).ready(function(){
			var toolbar = [
				['style', ['bold', 'italic', 'underline', 'clear']],
				['para', ['ol']],
			];

			$('.summernote').summernote({
				'minHeight': 150,
				'toolbar': toolbar
			});		

			var photo_key = {{ $photo_key }};

			$('.btn-entry-add').on('click', function(){
				var type = $(this).data('type');

				var html  = '<div class="panel panel-default">';
					html +=		'<div class="panel-body">';

				if (type == 'photo') {
					html += '<input type="file" name="photos[]" class="input-file" id="file-photo-' + photo_key + '">';
					html += '<label for="file-photo-' + photo_key + '" class="btn btn-primary btn-upload"><i class="fa fa-upload"></i> <span>Choose a file</span></label>';
					html += '<button type="button" class="btn btn-danger btn-entry-delete" data-type="photo"><i class="fa fa-close"></i></button>';
						
					photo_key++;
				}

				html += 	'</div>';
				html += '</div>';

				$('.photos').append(html);

				enableFileButtons();
			});

			$(document).delegate('.btn-entry-delete', 'click', function(){
				var type = $(this).data('type');

				if (type == 'photo') {
					photo_key--;
				}

				$(this).closest('.panel').remove();
			});
		});
	</script>
@stop