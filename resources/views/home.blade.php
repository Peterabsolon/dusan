<!DOCTYPE html>
<html class="page page--home">
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
				<h1 class="header__logo"><a href="{!! route('home') !!}"><span>Bez</span>názvu</a></h1>

				<button type="button" class="header__button" data-action="toggle-menu">
					<div class="header__button__bar"></div>
					<div class="header__button__bar"></div>
					<div class="header__button__bar"></div>
					<div class="header__button__bar"></div>
				</button>
			</div>
		</header> {{-- /header --}}

		<main class="content">
			<section class="services">
				<div class="container">
					{{-- Stuzkova --}}
					<div class="services__item">
						<div class="services__icon"><img src="{!! asset('images/site/icon_stuzkova-white.svg') !!}" alt="Stuzkova"></div>
						<h2 class="services__title">{{ $stuzkova->title }}</h2>
						<div class="services__description">{!! $stuzkova->body !!}</div>
						<a href="{!! route('stuzkova') !!}" class="services__btn btn btn--secondary">Mám záujem</a>
					</div>

					{{-- Svadba --}}
					<div class="services__item">
						<div class="services__icon"><img src="{!! asset('images/site/icon_svadba-white.svg') !!}" alt="Svadba"></div>
						<h2 class="services__title">{{ $svadba->title }}</h2>
						<div class="services__description">{!! $svadba->body !!}</div>
						<a href="{!! route('svadba') !!}" class="services__btn btn btn--secondary">Mám záujem</a>
					</div>					

					{{-- Udalost --}}
					<div class="services__item">
						<div class="services__icon"><img src="{!! asset('images/site/icon_udalost-white.svg') !!}" alt="Udalost"></div>
						<h2 class="services__title">{{ $udalost->title }}</h2>
						<div class="services__description">{!! $udalost->body !!}</div>
						<a href="{!! route('udalost') !!}" class="services__btn btn btn--secondary">Mám záujem</a>
					</div>
				</div>
			</section>
		</main>										

		<footer class="footer">	
			<div class="container">
				<div class="footer__contact">
					<h3 class="footer__contact__title">Kontakt</h3>
					<ul class="footer__contact__list">
						<li class="footer__contact__item"><a class="footer__contact__link" href="tel:{{ $phone }}">{{ $phone }}</a></li>
						<li class="footer__contact__item"><a class="footer__contact__link" href="mailto:{{ $email }}">{{ $email }}</a></li>
					</ul>
				</div>
				<div class="footer__copyrights">
					<span class="footer__copyrights__text">&copy; 2015 Beznazvu.sk. Všetky práva vyhradené.</span>
				</div>
			</div>
		</footer> {{-- /footer --}}

		<aside class="sidebar">
			<button class="sidebar__button" data-action="toggle-menu">
				<div class="sidebar__button__bar"></div>
				<div class="sidebar__button__bar"></div>
				<div class="sidebar__button__bar"></div>
				<div class="sidebar__button__bar"></div>				
			</button>

			<ul class="sidebar__menu">
				<li class="sidebar__menu__item"><a class="sidebar__menu__link" href="{!! route('home') !!}">Domov</a></li>
				<li class="sidebar__menu__item"><a class="sidebar__menu__link" href="{!! route('stuzkova') !!}">Stužková</a></li>
				<li class="sidebar__menu__item"><a class="sidebar__menu__link" href="{!! route('svadba') !!}">Svadba</a></li>
				<li class="sidebar__menu__item"><a class="sidebar__menu__link" href="{!! route('udalost') !!}">Udalosť</a></li>
				<li class="sidebar__menu__item"><a class="sidebar__menu__link" href="{!! route('referencie') !!}">Referencie</a></li>
				<li class="sidebar__menu__item"><a class="sidebar__menu__link" href="{!! route('kontakt') !!}">Kontakt</a></li>
			</ul> {{-- /menu --}}
		</aside>
	</body>

    <script src="{!! asset('assets/js/libs.js') !!}"></script>
    <script src="{!! asset('assets/js/app.js') !!}"></script>	
</html>