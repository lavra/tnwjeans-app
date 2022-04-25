@extends('layouts.template-1')
@push('title')
    <title>{{$configCompany->name}}</title>
@endpush
@push('body')
    <body class="{{$configSite->separator_style}} {{$configSite->color_style}}">
@endpush
@section('content')
    {{-- Preloader Starts --}}
    <div class="preloader" id="preloader">
        <div class="logopreloader">
            <img src="img/logo-tnwjeans.png" alt="logo-black">
        </div>
        <div class="loader5" id="loader"></div>
    </div>
    {{-- Configuração: Style --}}
    {{-- @include('configuration.style-1') --}}

    <div class="wrapper">
        {{-- Header --}}
        @include('headers.header-1')
        {{-- Slider --}}
        <section class="mainslider" id="mainslider">
            @if($isMobile)
                @include('home.mainslider.mobile.'.$configSite->mainslider)
            @else
                @include('home.mainslider.desktop.'.$configSite->mainslider)
            @endif
        </section>
        {{-- About Section --}}
        @include('abouts.about-1')
        {{-- Project Section --}}
        {{-- @include('projects.project-1') --}}
        @include('portfolios.portfolio-1')
        {{-- @include('facts.fact-1') --}}
        {{-- @include('newsletters.newsletter-1') --}}
        @if(count($instagram) >= 1)
            {{-- Instagram Section --}}
            @include('blogs.blog-1')
        @endif
        {{-- Video --}}
        {{-- @include('videos.video-1') --}}
        @if($products)
            @include('teams.team-1')
        @endif
        @include('locations.location-1')
        {{-- @include('contacts.contact-1') --}}
        {{-- @include('testimonials.testimonial-1') --}}
        {{-- @include('brands.brand-1') --}}
        {{-- @include('services.service-1') --}}
        {{-- Footer Section --}}
        @include('footers.footer-1')
        @include('whatsapps.whatsapp-1')
        {{-- Back To Top Starts
        <div id="back-top-wrapper" class="d-none d-sm-block">
            <p id="back-top">
                <a href="index.html#top"><span></span></a>
            </p>
        </div>
        --}}
    </div>
@endsection
    {{--
@push('scripts')
     <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-158115541-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        //gtag('config', 'UA-110066156-1');
        gtag('set', {'content_group1': 'Atacado de Jeans'});
        gtag('config', 'UA-158115541-1', {
            'custom_map': {'dimension1': 'tipo_de_conteudo','dimension2': 'categoria_conteudo'},
            'tipo_de_conteudo' : 'Home Site',
            'categoria_conteudo' : 'Atacado de Jeans'
        });
    </script>
 @endpush
 --}}
