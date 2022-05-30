@if(count($lookbooks) > 0)
<section id="portfolio" class="portfolio">
    <div class="container">
        <div class="text-center top-text">
            <h1><span>Outono</span> Inverno</h1>
            <h4>Campanha 2020</h4>
        </div>

        <!--
        <div class="divider text-center">
            <span class="outer-line"></span>
            <span class="fa fa-image" aria-hidden="true"></span>
            <span class="outer-line"></span>
        </div>

        <nav>
            <ul class="simplefilter nav nav-pills d-block">
                <li class="active" data-filter="all"><i class="fa fa-reorder"></i> All Projects</li>
                <li data-filter="1">Images</li>
                <li data-filter="2">Videos</li>
                <li data-filter="3">External Links</li>
            </ul>
        </nav>
         -->
        <div>
            <div class="filtr-container">

                @foreach($lookbooks as $lookbook)
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 filtr-item" data-category="1">
                    <div class="magnific-popup-gallery">
                        <!-- Categoria -->
                        @php 
                            $path = substr($lookbook->image, 0, -4); 
                            $name = explode('/', $path);
                        @endphp
                        <figure class="thumbnail thumbnail__portfolio">
                            <a class="image-wrap" href="{{ url("storage/{$lookbook->image}") }}" data-gal="magnific-pop-up[image]" title="{{$name[2]}}">
                                <img class="img-fluid" src="{{ url("storage/{$lookbook->image}") }}" alt="{{$name[2]}}" />
                                <span class="zoom-icon"></span>
                            </a>
                        </figure>
                        {{-- Descrição
                        <div class="caption">
                            <h3>Titulo</h3>
                            <p>Texto</p>
                        </div>
                        --}}
                    </div>
                </div>
                @endforeach
         
            </div>
        </div>
    </div>
    <!-- Container Ends -->
</section>
@endif
