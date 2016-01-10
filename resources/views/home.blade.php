<!DOCTYPE html>
<html class="page-home">
	<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Dusan Krajcovic</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <link href="{!! asset('images/site/favicon.png') !!}" rel="icon" />
        
        <link rel="stylesheet" href="{!! asset('assets/css/app.css') !!}" media="all" type="text/css" />
	</head>
	<body>

		<header class="header">
			<div class="container">
				<h1 class="header__logo"><span>Bez</span>názvu</h1>

				<button type="button" class="header__button btn-toggle-menu">
					<span class="btn-toggle-menu__bar"></span>
					<span class="btn-toggle-menu__bar"></span>
					<span class="btn-toggle-menu__bar"></span>
					<span class="btn-toggle-menu__bar"></span>
				</button>
			</div>
		</header> {{-- /.header --}}

		<section class="services">
			<div class="container">
				{{-- Stuzkova --}}
				<div class="service">
					<div class="service__icon"><img src="{!! asset('images/site/icon_stuzkova-white.svg') !!}" alt="Stuzkova"></div>
					<h2 class="service__title">{{ $stuzkova->title }}</h2>
					<div class="service__description">{!! $stuzkova->body !!}</div>
					<a href="{!! route('stuzkova') !!}" class="service__btn btn btn--secondary">Mám záujem</a>
				</div>

				{{-- Svadba --}}
				<div class="service">
					<div class="service__icon"><img src="{!! asset('images/site/icon_svadba-white.svg') !!}" alt="Svadba"></div>
					<h2 class="service__title">{{ $svadba->title }}</h2>
					<div class="service__description">{!! $svadba->body !!}</div>
					<a href="{!! route('svadba') !!}" class="service__btn btn btn--secondary">Mám záujem</a>
				</div>					

				{{-- Udalost --}}
				<div class="service">
					<div class="service__icon"><img src="{!! asset('images/site/icon_udalost-white.svg') !!}" alt="Udalost"></div>
					<h2 class="service__title">{{ $udalost->title }}</h2>
					<div class="service__description">{!! $udalost->body !!}</div>
					<a href="{!! route('udalost') !!}" class="service__btn btn btn--secondary">Mám záujem</a>
				</div>
			</div>										
		</section>

		<footer class="footer">
			<div class="container">
				<div class="contact">
					<h3 class="contact__title">Kontakt</h3>
					<ul class="contact__list">
						<li class="contact__item"><a class="contact__link" href="tel:{{ $phone }}">{{ $phone }}</a></li>
						<li class="contact__item"><a class="contact__link" href="mailto:{{ $email }}">{{ $email }}</a></li>
					</ul>
				</div>
				<div class="copyrights">
					<span class="copyrights__text">&copy; 2015 Beznazvu.sk. Všetky práva vyhradené.</span>
				</div>
			</div>
		</footer> {{-- /.footer --}}

		<aside class="sidebar">
			<ul class="menu">
				<li class="menu__item"><a class="menu__link" href="{!! route('home') !!}">Domov</a></li>
				<li class="menu__item"><a class="menu__link" href="{!! route('stuzkova') !!}">Stužková</a></li>
				<li class="menu__item"><a class="menu__link" href="{!! route('svadba') !!}">Svadba</a></li>
				<li class="menu__item"><a class="menu__link" href="{!! route('udalost') !!}">Udalosť</a></li>
				<li class="menu__item"><a class="menu__link" href="{!! route('referencie') !!}">Referencie</a></li>
				<li class="menu__item"><a class="menu__link" href="{!! route('kontakt') !!}">Kontakt</a></li>
			</ul>
		</aside> {{-- /.sidebar --}}
	</body>

    <script src="{!! asset('assets/js/libs.js') !!}"></script>
    <script src="{!! asset('assets/js/app.js') !!}"></script>	
</html>