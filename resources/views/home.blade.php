<!DOCTYPE html>
<html class="page page--home">
	<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{ $site_title }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <link href="{!! asset('images/site/favicon.png') !!}" rel="icon" />
        
        <link rel="stylesheet" href="{!! asset('assets/css/app.css') !!}" media="all" type="text/css" />
	</head>
	<body>

		<header class="header">
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
			<section class="homepage-boxes">
				<div class="container">
					{{-- Stuzkova --}}
					<div class="homepage-box wow fadeInUp" data-wow-delay="50ms">
						<div class="homepage-box__icon"><img src="{!! asset('images/site/icon_stuzkova-white.svg') !!}" alt="Stuzkova"></div>
						<h2 class="homepage-box__title">{{ $stuzkova->title }}</h2>
						<div class="homepage-box__description">{!! $stuzkova->body !!}</div>
						<a href="{!! route('stuzkova') !!}" class="homepage-box__btn btn btn--secondary">Mám záujem</a>
					</div>

					{{-- Svadba --}}
					<div class="homepage-box wow fadeInUp" data-wow-delay="150ms">
						<div class="homepage-box__icon"><img src="{!! asset('images/site/icon_svadba-white.svg') !!}" alt="Svadba"></div>
						<h2 class="homepage-box__title">{{ $svadba->title }}</h2>
						<div class="homepage-box__description">{!! $svadba->body !!}</div>
						<a href="{!! route('svadba') !!}" class="homepage-box__btn btn btn--secondary">Mám záujem</a>
					</div>					

					{{-- Udalost --}}
					<div class="homepage-box wow fadeInUp" data-wow-delay="300ms">
						<div class="homepage-box__icon"><img src="{!! asset('images/site/icon_udalost-white.svg') !!}" alt="Udalost"></div>
						<h2 class="homepage-box__title">{{ $udalost->title }}</h2>
						<div class="homepage-box__description">{!! $udalost->body !!}</div>
						<a href="{!! route('udalost') !!}" class="homepage-box__btn btn btn--secondary">Mám záujem</a>
					</div>
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
					<span class="copyrights__text">&copy; 2015 {{ $site_title }}.sk. Všetky práva vyhradené.</span>
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
    {!! option('tracking') !!}
</html>