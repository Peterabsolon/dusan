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
				<h1 class="logo"><a href="{!! route('home') !!}"><span>Bez</span>názvu</a></h1>

				<button type="button" class="menu-button menu-button--open" data-action="toggle-menu">
					<div class="menu-button__bar"></div>
					<div class="menu-button__bar"></div>
					<div class="menu-button__bar"></div>
					<div class="menu-button__bar"></div>
				</button>
			</div>
		</header> {{-- /header --}}

		<main class="content">
			<section class="service">
				<div class="container">
					<div class="page-header wow fadeInUp">
						<div class="page-icon">
							<img src="{!! asset('/images/site/' . $service->image) !!}" alt="{{ $service->title }}">
						</div>					
						<h2 class="page-title">{{ $service->title }}</h2>
					</div>

					<div class="perex wow fadeInUp" data-wow-delay="150ms">
						{!! $service->body !!}
					</div>
			
					<div class="service-descriptions">
						@if (!empty($service->photo_services))
							<div class="service-description wow fadeInUp" data-wow-delay="300ms">
								<div class="service-description__icon">
									<img src="{!! asset('/images/site/icon_camera.svg') !!}">
								</div>
								<div class="service-description__list">
									{!! $service->photo_services !!}
								</div>
							</div>
						@endif

						@if (!empty($service->video_services))
							<div class="service-description wow fadeInUp" data-wow-delay="450ms">
								<div class="service-description__icon">
									<img src="{!! asset('/images/site/icon_video.svg') !!}">
								</div>
								<div class="service-description__list">
									{!! $service->video_services !!}
								</div>
							</div>
						@endif

						@if (!empty($service->dj_services))
							<div class="service-description wow fadeInUp" data-wow-delay="600ms">
								<div class="service-description__icon">
									<img src="{!! asset('/images/site/icon_dj.svg') !!}">
								</div>
								<div class="service-description__list">
									{!! $service->dj_services !!}
								</div>
							</div> 
						@endif
					</div>

					<a href="{!! route('referencie') !!}" class="btn-references btn btn--primary wow fadeInUp" data-wow-delay="200ms">Referencie</a>
	
					@if (($service->prices_left->count() > 0) || ($service->prices_right->count() > 0))
						<h3 class="wow fadeInUp" data-wow-delay="200ms">Cenník</h3>	

						<div class="pricelist">
							@if ($service->prices_left->count() > 0)
								<ul class="pricelist__list wow fadeInUp" data-wow-delay="200ms">
									@foreach($service->prices_left as $price)
										<li class="pricelist__item">
											<div class="pricelist__title">
												{{ $price->title }}
											</div>
											<div class="pricelist__dots">
											</div>
											<div class="pricelist__price">
												{{ $price->price }} &euro;
											</div>																						
										</li>
									@endforeach									
								</ul>
							@endif

							@if ($service->prices_right->count() > 0)
								<ul class="pricelist__list wow fadeInUp" data-wow-delay="350ms">
									@foreach($service->prices_right as $price)
										<li class="pricelist__item">
											<div class="pricelist__title">
												{{ $price->title }}
											</div>
											<div class="pricelist__dots">
											</div>
											<div class="pricelist__price">
												{{ $price->price }} &euro;
											</div>																						
										</li>
									@endforeach									
								</ul>
							@endif							
						</div>
					@endif

					@if (!empty($service->note)) 
						<div class="travel-note wow fadeInUp" data-wow-delay="200ms">
							{!! $service->note !!}
						</div>
					@endif
	
					@if ($service->packages->count() > 0)
						<h3 class="wow fadeInUp" data-wow-delay="200ms">Výhodné balíky</h3>

						<div class="packages wow fadeInUp">
							@foreach ($service->packages as $key => $package)
								<?php $package_delay = 200; ?>
								<div class="package wow fadeInUp" data-wow-delay="{{ $package_delay }}ms">
									<div class="package__icon">
										<img src="{!! asset('/images/site/icon_package.svg') !!}">
										<div class="package__number">
											{{ $key + 1 }}
										</div>
									</div>
									<div class="package__body">
										{!! $package->body !!}
									</div>
									<div class="package__price">
										{{ $package->price }} &euro;
									</div>									
								</div>
								<?php $package_delay += 150; ?>
							@endforeach
						</div>
					@endif

					<a href="{!! route('kontakt') !!}" class="btn-references btn btn--primary wow fadeInUp" data-wow-delay="200ms">Kontakt</a>
				</div>
			</section>
		</main>
			
		<footer class="footer">	
			<div class="container">
				<div class="contact-info wow fadeIn">
					<h3 class="contact-info__title">Kontakt</h3>
					<ul class="contact-info__list">
						<li class="contact-info__item"><a class="contact-info__link" href="tel:{{ $phone }}">{{ $phone }}</a></li>
						<li class="contact-info__item"><a class="contact-info__link" href="mailto:{{ $email }}">{{ $email }}</a></li>
					</ul>
				</div>
				<div class="copyrights wow fadeIn">
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