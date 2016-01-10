<!DOCTYPE html>
<html class="page-{{ $service->slug }}">
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
			<section class="service">
				<div class="service__title">
					<div class="service__title__image">
						<img src="{!! asset('/images/site/' . $service->image) !!}" alt="{{ $service->title }}">
					</div>
					<h2 class="page-title__heading">{{ $service->title }}</h2>
				</div> {{-- /.page-title --}}

				<div class="page-perex">
					{!! $service->body !!}
				</div> {{-- /.page-perex --}}
		
				<div class="page-services">
					<div class="service service--photo">
						<div class="service__icon">
							<img src="{!! asset('/images/site/icon_camera.svg') !!}">
						</div>
						<div class="service__list">
							{!! $service->photo_services !!}
						</div>
					</div> {{-- /.service--photo --}}

					<div class="service service--video">
						<div class="service__icon">
							<img src="{!! asset('/images/site/icon_video.svg') !!}">
						</div>
						<div class="service__list">
							{!! $service->video_services !!}
						</div>
					</div> {{-- /.service--video --}}

					<div class="service service--dj">
						<div class="service__icon">
							<img src="{!! asset('/images/site/icon_dj.svg') !!}">
						</div>
						<div class="service__list">
							{!! $service->dj_services !!}
						</div>
					</div> {{-- /.service--dj --}}				
				</div> {{-- /.page-services --}}

				<a href="{!! route('referencie') !!}" class="btn btn--primary">Zobraziť referencie</a>
				
				<h3 class="content-title">Cenník</h3>	

				<div class="pricelist">
					
				</div>

				<div class="page-travel-note">
					{!! $service->note !!}
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