<!DOCTYPE html>
<html class="page page--references">
	<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Dusan Krajcovic</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <link href="{!! asset('images/site/favicon.png') !!}" rel="icon" />
        
        <link rel="stylesheet" href="{!! asset('assets/css/app.css') !!}" media="all" type="text/css" />
	</head>
	
	<body>

		<header class="header header--static">
			<div class="container">
				<h1 class="header__logo"><a href="{!! route('home') !!}"><span>Bez</span>názvu</a></h1>

				<button type="button" class="header__button" data-action="toggle-menu">
					<span class="header__button__bar"></span>
					<span class="header__button__bar"></span>
					<span class="header__button__bar"></span>
					<span class="header__button__bar"></span>
				</button>
			</div>
		</header> {{-- /.header --}}

		<main class="content">
			<section class="references">
				<div class="container">
					<div class="page-header">					
						<h2 class="page-title">Referencie</h2>
					</div>

					@foreach ($references as $reference_key => $reference)
						<div class="reference">
							<h2 class="content-title">{{ $reference->title }}</h2>
							<div class="reference__body">{!! $reference->body !!}</div>
							@if ($reference->photos->count() > 0)
							<div class="reference__photos">
								@foreach ($reference->photos as $photo_key => $photo)
								<picture>
									<source srcset="{!! asset('images/photos/' . $photo->photo_large) !!}" media="(min-width: 1200px)">
									<source srcset="{!! asset('images/photos/' . $photo->photo_medium) !!}" media="(min-width: 768px)">
									<source srcset="{!! asset('images/photos/' . $photo->photo_small_2x) !!}" media="(-webkit-min-device-pixel-ratio: 1.5), only screen and (min-resolution: 144dpi), (-webkit-min-device-pixel-ratio: 144), (min-resolution: 144dppx)">
									<img srcset="{!! asset('images/photos/' . $photo->photo_small) !!}">
								</picture>
								@endforeach
							</div>
							@endif
						</div>
					@endforeach
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

	<script>
	// Picture element HTML5 shiv
	document.createElement( "picture" );
	</script>
    <script src="{!! asset('assets/js/libs.js') !!}"></script>
    <script src="{!! asset('assets/js/app.js') !!}"></script>	
</html>