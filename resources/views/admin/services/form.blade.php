@if(isset($model))
{!! Form::model($model, ['method' => 'PUT', 'files' => true, 'route' => ['admin.services.update', $model->id]]) !!}
@else
{!! Form::open(['files' => true, 'route' => 'admin.services.store']) !!}
@endif
	<div class="form-group">
		{!! Form::label('title', 'Title:') !!}
		{!! Form::text('title', null, ['class' => 'form-control']) !!}
		{!! $errors->first('title', '<div class="text-danger">:message</div>') !!}
	</div>
	<div class="form-group">
		{!! Form::label('slug', 'Slug:') !!}
		{!! Form::text('slug', null, ['class' => 'form-control']) !!}
		{!! $errors->first('slug', '<div class="text-danger">:message</div>') !!}
	</div>
	<div class="form-group">
		{!! Form::label('sort_order', 'Sort order:') !!}
		{!! Form::number('sort_order', null, ['class' => 'form-control']) !!}
		{!! $errors->first('sort_order', '<div class="text-danger">:message</div>') !!}
	</div>	
	<div class="form-group">
		{!! Form::label('', 'Image:') !!}
		{!! Form::file('image', ['class' => 'input-file', 'id' => 'image']) !!}
		<label for="image" class="btn btn-primary btn-upload"><i class="fa fa-upload"></i> <span>Choose a file</span></label>
		{!! $errors->first('image', '<div class="text-danger">:message</div>') !!}
	</div>
	@if(isset($model))
	<div class="form-group">
		@if($model->image)
		<div class="img-thumbnail img-maxwidth">
			<img class="img-responsive" src="{!! asset('images/services/' . $model->image) !!}">
		</div>
		@endif
	</div>
	@endif	
	<div class="form-group">
		{!! Form::label('body', 'Description:') !!}
		{!! Form::textarea('body', null, ['class' => 'form-control summernote']) !!}
		{!! $errors->first('body', '<div class="text-danger">:message</div>') !!}
	</div>
	<div class="form-group">
		{!! Form::label('entry_photo', 'Photo services:') !!}
		{!! Form::textarea('photo_services', null, ['class' => 'form-control summernote']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('entry_photo', 'Video services:') !!}
		{!! Form::textarea('video_services', null, ['class' => 'form-control summernote']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('entry_photo', 'DJ services:') !!}
		{!! Form::textarea('dj_services', null, ['class' => 'form-control summernote']) !!}
	</div>	
	<div class="form-group">
		{!! Form::label('prices_left', 'Price list left column:') !!}
		<div class="entry-group">
			<?php $price_left_key = 0; ?>
			@if(isset($model))			
				@foreach($model->prices_left as $key => $price)
					<div class="well">
						{!! Form::text('prices_left[' . $key . '][title]', $price->title, ['class' => 'entry-price-title form-control', 'placeholder' => 'Title']) !!}
						{!! Form::text('prices_left[' . $key . '][price]', $price->price, ['class' => 'entry-price-price form-control', 'placeholder' => 'Price']) !!}
						<button type="button" class="btn btn-danger btn-entry-delete" data-type="price-left"><i class="fa fa-close"></i></button>
					</div>
					<?php $price_left_key++; ?>
				@endforeach
			@endif
		</div>
		<button type="button" class="btn btn-success btn-entry-add" data-type="price-left"><i class="fa fa-plus"></i> Add price</button>
	</div>	
	<div class="form-group">
		{!! Form::label('prices_right', 'Price list right column:') !!}
		<div class="entry-group">
			<?php $price_right_key = 0; ?>
			@if(isset($model))
				@foreach($model->prices_right as $key => $price)
					<div class="well">
						{!! Form::text('prices_right[' . $key . '][title]', $price->title, ['class' => 'entry-price-title form-control', 'placeholder' => 'Title']) !!}
						{!! Form::text('prices_right[' . $key . '][price]', $price->price, ['class' => 'entry-price-price form-control', 'placeholder' => 'Price']) !!}
						<button type="button" class="btn btn-danger btn-entry-delete" data-type="price-right"><i class="fa fa-close"></i></button>
					</div>
				<?php $price_right_key++; ?>
				@endforeach
			@endif
		</div>
		<button type="button" class="btn btn-success btn-entry-add" data-type="price-right"><i class="fa fa-plus"></i> Add price</button>
	</div>		
	<div class="form-group">
		{!! Form::label('note', 'Travel note:') !!}
		{!! Form::textarea('note', null, ['class' => 'form-control summernote-sm']) !!}
		{!! $errors->first('note', '<div class="text-danger">:message</div>') !!}
	</div>	
	<div class="form-group">
		{!! Form::label('packages', 'Packages:') !!}
		<div class="entry-group entry-group-packages">
			<?php $package_key = 0; ?>
			@if(isset($model))
				@foreach($model->packages as $key => $package)
					<div class="well">
						<h4>#{{ ($package_key + 1) }}</h4>
						{!! Form::textarea('packages[' . $key . '][body]', $package->body, ['class' => 'form-control summernote', 'placeholder' => 'Text']) !!}
						{!! Form::number('packages[' . $key . '][price]', $package->price, ['class' => 'form-control', 'placeholder' => 'Price']) !!}
						<button type="button" class="btn btn-danger btn-entry-delete" data-type="package"><i class="fa fa-close"></i> Remove package</button>
					</div>
				<?php $package_key++; ?>				
				@endforeach
			@endif
		</div>
		<button type="button" class="btn btn-success btn-entry-add" data-type="package"><i class="fa fa-plus"></i> Add package</button>
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

			$('.summernote-sm').summernote({
				'height': 40,
				'toolbar': toolbar
			});			

			var price_left_key = {{ $price_left_key }};

			var price_right_key = {{ $price_right_key }};

			var package_key = {{ $package_key }};

			$('.btn-entry-add').on('click', function(){
				var type = $(this).data('type');

				var html  = '<div class="well">';

				if (type == 'price-left') {
					html += '<input type="text" name="prices_left[' + price_left_key + '][title]" class="entry-price-title form-control" placeholder="Title">';
					html += '<input type="number" name="prices_left[' + price_left_key + '][price]" class="entry-price-price form-control" placeholder="Price">';
					html += '<button type="button" class="btn btn-danger btn-entry-delete" data-type="price-left"><i class="fa fa-close"></i></button>';

					price_left_key++;
				} 

				else if (type == 'price-right') {
					html += '<input type="text" name="prices_right[' + price_right_key + '][title]" class="entry-price-title form-control" placeholder="Title">';
					html += '<input type="number" name="prices_right[' + price_right_key + '][price]" class="entry-price-price form-control" placeholder="Price">';
					html += '<button type="button" class="btn btn-danger btn-entry-delete" data-type="price-right"><i class="fa fa-close"></i></button>';				

					price_right_key++;
				}

				else if (type == 'package') {
					html += '<h4>#' + (package_key + 1) + '</h4>';
					html += '<textarea name="packages[' + package_key + '][body]" class="form-control summernote"></textarea>';
					html += '<input type="number" name="packages[' + package_key + '][price]" class="form-control" placeholder="Price">';
					html += '<button type="button" class="btn btn-danger btn-entry-delete" data-type="package"><i class="fa fa-close"></i> Remove package</button>';

					package_key++;
				}

				html += '</div>';

				$(this).siblings('.entry-group').append(html);

				// Reinitialize summernote on appended textarea
				$('.summernote').summernote({
					'minHeight': 150,
					'toolbar': toolbar
				});				
			});

			$(document).delegate('.btn-entry-delete', 'click', function(){
				var type = $(this).data('type');

				if (type == 'price-left') {
					price_left_key--;
				} else if (type == 'price-right') {
					price_right_key--;
				} else if (type == 'package') {
					package_key--;
				}

				$(this).parent().remove();
			});
		});
	</script>
@stop
