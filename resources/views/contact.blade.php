<!DOCTYPE html>
<html class="page page--contact">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>{{ $site_title }}</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<link href="{!! asset('images/site/favicon.png') !!}" rel="icon" />
		
		<link rel="stylesheet" href="{!! asset('assets/css/app.css') !!}" media="all" type="text/css" />
	</head>
	<body>

		<header class="header header--static">
			<div class="container">
				<h1 class="logo"><a href="{!! route('home') !!}">{!! $site_name !!}</a></h1>

				<button type="button" class="menu-button menu-button--open" data-action="toggle-menu">
					<div class="menu-button__bar"></div>
					<div class="menu-button__bar"></div>
					<div class="menu-button__bar"></div>
					<div class="menu-button__bar"></div>
				</button>
			</div>
		</header> {{-- /header --}}

		<main class="content">
			<section class="contact">
				<div class="container">
					<div class="contact-data wow fadeInUp">
						<div class="phone">Telefónne číslo: <a href="tel:{{ $phone }}"> <strong>{{ $phone }}</strong></a></div>
						<div class="email">E-mail: <a href="mailto:{{ $email }}"> <strong>{{ $email }}</strong></a></div>
					</div>

					@if(Session::has('message'))
						<div class="form-success">
						  {{Session::get('message')}}
						</div>
					@endif                    

					{!! Form::open(array('route' => 'contact.send', 'class' => 'contact-form wow fadeInUp', 'method' => 'POST', 'data-wow-delay' => '150ms')) !!}

						<?php if($errors->first('name')) { ?>
						<div class="form-group has-error">
						<?php } else { ?>
						<div class="form-group">
						<?php } ?>
							{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Meno*']) !!}
							{!! $errors->first('name', '<div class="form-error">:message</div>'); !!}
						</div>
						<?php if($errors->first('email')) { ?>
						<div class="form-group has-error">
						<?php } else { ?>
						<div class="form-group">
						<?php } ?>
							{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'E-mail*']) !!}
							{!! $errors->first('email', '<div class="form-error">:message</div>'); !!}
						</div>                   
						<div class="form-group">
							{!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Telefónne číslo']) !!}
						</div>                   
						<div class="form-group">
							{!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Predmet správy']) !!}
						</div>                                              
						<?php if($errors->first('body')) { ?>
						<div class="form-group has-error">
						<?php } else { ?>
						<div class="form-group">
						<?php } ?>
							{!! Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => 'Vaša správa']) !!}
							{!! $errors->first('body', '<div class="form-error error-textarea">:message</div>'); !!}
						</div>
						<div class="form-group">
							{!! Form::submit('Odoslať', ['class' => 'btn btn--primary btn-submit']) !!}
						</div>                            

					{!! Form::close() !!}					
				</div>
			</section>
		</main>										

		<footer class="footer ">	
			<div class="container">
				<div class="contact-info">
					<h3 class="contact-info__title">Kontakt</h3>
					<ul class="contact-info__list">
						<li class="contact-info__item"><a class="contact-info__link" href="tel:{{ $phone }}">{{ $phone }}</a></li>
						<li class="contact-info__item"><a class="contact-info__link" href="mailto:{{ $email }}">{{ $email }}</a></li>
					</ul>
				</div>
				<div class="copyrights">
					<span class="copyrights__text">&copy; 2015 Beznazvu.sk. Všetky práva vyhradené.</span>
				</div>
			</div>
		</footer> {{-- /footer --}}

		<aside class="sidebar">
			<button class="menu-button menu-button--close" data-action="toggle-menu">
				<div class="menu-button__bar"></div>
				<div class="menu-button__bar"></div>
				<div class="menu-button__bar"></div>
				<div class="menu-button__bar"></div>				
			</button>

			<ul class="menu">
				<li class="menu__item"><a class="menu__link" href="{!! route('home') !!}">Domov</a></li>
				<li class="menu__item"><a class="menu__link" href="{!! route('stuzkova') !!}">Stužková</a></li>
				<li class="menu__item"><a class="menu__link" href="{!! route('svadba') !!}">Svadba</a></li>
				<li class="menu__item"><a class="menu__link" href="{!! route('udalost') !!}">Udalosť</a></li>
				<li class="menu__item"><a class="menu__link" href="{!! route('referencie') !!}">Referencie</a></li>
				<li class="menu__item"><a class="menu__link" href="{!! route('kontakt') !!}">Kontakt</a></li>
			</ul> {{-- /menu --}}
		</aside>
	</body>

	<script src="{!! asset('assets/js/libs.js') !!}"></script>
	<script src="{!! asset('assets/js/app.js') !!}"></script>	
</html>