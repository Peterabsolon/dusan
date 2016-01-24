@extends($layout)

@section('content-header')
	<h1>
	Settings
	</h1>
@stop

@section('content')

<!-- Nav tabs -->
<ul class="nav nav-tabs">
	<li class="active"><a href="#general" data-toggle="tab">General</a></li>
	<li><a href="#data" data-toggle="tab">Data</a></li>
	<li><a href="#social" data-toggle="tab">Social Media</a></li>
	<li><a href="#seo" data-toggle="tab">SEO</a></li>
	<li><a href="#analytics" data-toggle="tab">Analytics</a></li>
	<li><a href="#backup" data-toggle="tab">Cache And Reset</a></li>
	<li><a href="#developers" data-toggle="tab">Developers</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
	<div class="tab-pane active" id="general">
		<h3></h3>
		{!! Form::open() !!}
		<div class="form-group">
			{!! Form::label('site_name', 'Site Name:') !!}
			{!! Form::textarea('site_name', option('site.name'), ['class' => 'form-control summernote']) !!}
			{!! $errors->first('site_name', '<div class="text-danger">:message</div>') !!}
		</div>
		<div class="form-group">
			{!! Form::label('site_title', 'Site Title:') !!}
			{!! Form::text('site_title', option('site.title'), ['class' => 'form-control']) !!}
			{!! $errors->first('site_title', '<div class="text-danger">:message</div>') !!}
		</div>		
		<div class="form-group">
			{!! Form::label('site.slogan', 'Slogan:') !!}
			{!! Form::text('site.slogan', option('site.slogan'), ['class' => 'form-control']) !!}
			{!! $errors->first('site.slogan', '<div class="text-danger">:message</div>') !!}
		</div>
		<div class="form-group">
			{!! Form::label('site.description', 'Description:') !!}
			{!! Form::textarea('site.description', option('site.description'), ['class' => 'form-control']) !!}
			{!! $errors->first('site.description', '<div class="text-danger">:message</div>') !!}
		</div>
		<div class="form-group">
			{!! Form::label('contact.email', 'Contact e-mail:') !!}
			{!! Form::text('contact.email', option('contact.email'), ['class' => 'form-control']) !!}
			{!! $errors->first('contact.email', '<div class="text-danger">:message</div>') !!}
		</div>
		<div class="form-group">
			{!! Form::label('contact.phone', 'Contact phone:') !!}
			{!! Form::text('contact.phone', option('contact.phone'), ['class' => 'form-control']) !!}
			{!! $errors->first('contact.phone', '<div class="text-danger">:message</div>') !!}
		</div>				
		<div class="form-group">
			{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
		</div>
		{!! Form::close() !!}
	</div>
	<div class="tab-pane" id="data">
		<h3></h3>
		{!! Form::open() !!}
		<div class="form-group">
			{!! Form::label('pagination.perpage', 'Pagination Per Page:') !!}
			{!! Form::text('pagination.perpage', option('pagination.perpage'), ['class' => 'form-control']) !!}
			{!! $errors->first('pagination.perpage', '<div class="text-danger">:message</div>') !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
		</div>
		{!! Form::close() !!}
	</div>
	<div class="tab-pane" id="developers">
		<h3></h3>
		{!! Form::open() !!}
		<div class="form-group">
			{!! Form::label('ckfinder.prefix', 'CKFinder Prefix Path:') !!}
			{!! Form::text('ckfinder.prefix', option('ckfinder.prefix'), ['class' => 'form-control']) !!}
			{!! $errors->first('ckfinder.prefix', '<div class="text-danger">:message</div>') !!}
		</div>
		<div class="form-group hidden">
			{!! Form::label('admin.theme', 'Admin Theme:') !!}
			{!! Form::select('admin.theme', $themes, option('admin.theme'), ['class' => 'form-control']) !!}
			{!! $errors->first('admin.theme', '<div class="text-danger">:message</div>') !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
		</div>
		{!! Form::close() !!}
	</div>
	<div class="tab-pane" id="backup">
		<h3></h3>
		@if(defined("STDIN"))
		<p>
			{!! modal_popup(route('admin.reinstall'), 'Reinstall Website', 'Anda yakin ingin menginstall ulang website ini ?')!!}
		</p>
		<p>
			{!! modal_popup(route('admin.cache.clear'), 'Clear Cache', 'Anda yakin ingin menghapus cache?')!!}
		</p>
		@else
		<div class="alert alert-warning">
			<p>
				Sorry, your server is not support artisan via interface.
			</p>
		</div>
		@endif
	</div>
	<div class="tab-pane" id="seo">
		<h3></h3>
		{!! Form::open() !!}
		<div class="form-group">
			{!! Form::label('site.keywords', 'Keyword:') !!}
			{!! Form::text('site.keywords', option('site.keywords'), ['class' => 'form-control']) !!}
			{!! $errors->first('site.keywords', '<div class="text-danger">:message</div>') !!}
		</div>
		<div class="form-group">
			{!! Form::label('post.permalink', 'Post Permalink:') !!}
			{!! Form::text('post.permalink', option('post.permalink'), ['class' => 'form-control']) !!}
			{!! $errors->first('post.permalink', '<div class="text-danger">:message</div>') !!}
			<p class="help-block">Permalink URL for article or page.</p>
		</div>
		<div class="form-group">
			{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
		</div>
		{!! Form::close() !!}
	</div>
	<div class="tab-pane" id="social">
		<h3></h3>
		{!! Form::open() !!}
		<div class="form-group">
			{!! Form::label('facebook.link', 'Facebook Link:') !!}
			{!! Form::text('facebook.link', option('facebook.link'), ['class' => 'form-control']) !!}
			{!! $errors->first('facebook.link', '<div class="text-danger">:message</div>') !!}
		</div>
		<div class="form-group">
			{!! Form::label('twitter.link', 'Twitter Link:') !!}
			{!! Form::text('twitter.link', option('twitter.link'), ['class' => 'form-control']) !!}
			{!! $errors->first('twitter.link', '<div class="text-danger">:message</div>') !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
		</div>
		{!! Form::close() !!}
	</div>
	<div class="tab-pane" id="analytics">
		<h3></h3>
		{!! Form::open() !!}
		<div class="form-group">
			{!! Form::label('tracking', 'Tracking Script:') !!}
			{!! Form::textarea('tracking', option('tracking'), ['class' => 'form-control']) !!}
			{!! $errors->first('tracking', '<div class="text-danger">:message</div>') !!}
			<p class="help-block">
				To append this script just add : <span class="muted">@{!! option('tacking') !!}</span> on your view.
			</p>
		</div>
		<div class="form-group">
			{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
		</div>
		{!! Form::close() !!}
	</div>
</div>

@stop

@section('script')

	<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.7.1/summernote.css" rel="stylesheet">
	<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.7.1/summernote.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			var toolbar = [
				['style', ['bold', 'clear']]
			];

			$('.summernote').summernote({
				'minHeight': 50,
				'toolbar': toolbar
			});			
		});
	</script>
@stop
