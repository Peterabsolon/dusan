<!DOCTYPE html>
<html class="page page--{{ $service->slug }}">
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
				<div class="container">
					<div class="service-header">
						<div class="service-header__image">
							<img src="{!! asset('/images/site/' . $service->image) !!}" alt="{{ $service->title }}">
						</div>
						<h2 class="service-header__title">{{ $service->title }}</h2>
					</div>

					<div class="service-body">
						{!! $service->body !!}
					</div>
			
					<div class="service-details">
						<div class="service-detail">
							<div class="service-detail__icon">
								<img src="{!! asset('/images/site/icon_camera.svg') !!}">
							</div>
							<div class="service-detail__list">
								{!! $service->photo_services !!}
							</div>
						</div>

						<div class="service-detail">
							<div class="service-detail__icon">
								<img src="{!! asset('/images/site/icon_video.svg') !!}">
							</div>
							<div class="service-detail__list">
								{!! $service->video_services !!}
							</div>
						</div>

						<div class="service-detail">
							<div class="service-detail__icon">
								<img src="{!! asset('/images/site/icon_dj.svg') !!}">
							</div>
							<div class="service-detail__list">
								{!! $service->dj_services !!}
							</div>
						</div> 
					</div>

					<a href="{!! route('referencie') !!}" class="btn-references btn btn--primary">Referencie</a>
	
					@if (($service->prices_left->count() > 0) || ($service->prices_right->count() > 0))
						<h3>Cenník</h3>	

						<div class="service-pricelist">
							@if ($service->prices_left->count() > 0)
								<ul class="service-pricelist__list">
									@foreach($service->prices_left as $price)
										<li class="service-pricelist__item">
											<div class="service-pricelist__title">
												{{ $price->title }}
											</div>
											<div class="service-pricelist__dots">
											</div>
											<div class="service-pricelist__price">
												{{ $price->price }} &euro;
											</div>																						
										</li>
									@endforeach									
								</ul>
							@endif

							@if ($service->prices_right->count() > 0)
								<ul class="service-pricelist__list">
									@foreach($service->prices_right as $price)
										<li class="service-pricelist__item">
											<div class="service-pricelist__title">
												{{ $price->title }}
											</div>
											<div class="service-pricelist__dots">
											</div>
											<div class="service-pricelist__price">
												{{ $price->price }} &euro;
											</div>																						
										</li>
									@endforeach									
								</ul>
							@endif							
						</div>
					@endif

					@if (!empty($service->note)) 
						<div class="service-note">
							{!! $service->note !!}
						</div>
					@endif
	
					@if ($service->packages->count() > 0)
						<h3>Výhodné balíky</h3>

						<div class="service-packages">
							@foreach ($service->packages as $key => $package)
								<div class="service-package">
									<div class="service-package__icon">
										<img src="{!! asset('/images/site/icon_package.svg') !!}">
										<div class="service-package__number">
											{{ $key + 1 }}
										</div>
									</div>
									<div class="service-package__body">
										{!! $package->body !!}
									</div>
									<div class="service-package__price">
										{{ $package->price }} &euro;
									</div>									
								</div>
							@endforeach
						</div>
					@endif
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