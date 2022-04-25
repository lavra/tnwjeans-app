<header id="header" class="header">
    <div class="header-inner">
        {{--  Navbar Starts --}}
        <nav class="navbar navbar-expand-lg p-0" id="singlepage-nav">
            {{-- Logo Starts --}}
            <div class="logo">
                <a data-toggle="collapse" data-target=".navbar-collapse.show" class="navbar-brand link-menu scroll-to-target" href="#mainslider">
                    {{-- Logo White Starts --}}
                    <img id="logo-light" class="logo-light" src="{{asset('img/logo-tnwjeans-2.png')}}" alt="logo-light" />
                    {{-- Logo Black Starts --}}
                    <img id="logo-dark" class="logo-dark" src="{{asset('img/logo-tnwjeans-2.png')}}" alt="logo-dark" />
                </a>
            </div>
            {{-- Hamburger Icon Starts --}}
            <button class="navbar-toggler p-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span id="icon-toggler">
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                </span>
            </button>
            {{-- Navigation Menu Starts --}}
            <div class="collapse navbar-collapse nav-menu" id="navbarSupportedContent">
                <ul class="nav-menu-inner ml-auto">
                    <li><a data-toggle="collapse" data-target=".navbar-collapse.show" class="link-menu" href="#mainslider"><i class="fa fa-home"></i> HOME</a></li>
                    <li><a data-toggle="collapse" data-target=".navbar-collapse.show" class="link-menu" href="#quem-somos"><i class="fa fa-history"></i> QUEM SOMOS</a></li>
                    {{-- <li><a data-toggle="collapse" data-target=".navbar-collapse.show" class="link-menu" href="#colecoes-anteriores"><i class="fa fa-cog"></i> Coleções Anteriores</a></li> --}}
                    <li><a data-toggle="collapse" data-target=".navbar-collapse.show" class="link-menu" href="#portfolio"><i class="fa fa-image"></i> Campanha</a></li>
                    @if($products)
                        <li><a data-toggle="collapse" data-target=".navbar-collapse.show" class="link-menu" href="#lookbook"><i class="fa fa-shopping-cart"></i> COMPRE ONLINE</a></li>
                    @endif
                    {{-- <li><a data-toggle="collapse" data-target=".navbar-collapse.show" class="link-menu" href="#video"><i class="fa fa-video-camera"></i> Video</a></li> --}}
                    @if(count($instagram) >= 1)
                        <li><a data-toggle="collapse" data-target=".navbar-collapse.show" class="link-menu" href="#instagram"><i class="fa fa-instagram"></i> Instagram</a></li>
                    @endif
                    <li><a data-toggle="collapse" data-target=".navbar-collapse.show" class="link-menu" href="#lacalizacao"><i class="fa fa-map-marker"></i> Localização</a></li>
                {{-- <li><a data-toggle="collapse" data-target=".navbar-collapse.show" class="link-menu" href="#contato"><i class="fa fa-envelope"></i> Contato</a></li> --}}
                </ul>
            </div>

        </nav>

    </div>
</header>
