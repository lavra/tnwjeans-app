<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{$product->name}}</title>
    <meta name="description" content="{{$product->description}} - {{$product->composition}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">.
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index,follow">
    <meta property="og:url" content="{{route('product-detail', $product->id)}}?share=true"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{{$product->name}}"/>
    <meta property="og:description" content="{{$product->description}} - {{$product->composition}}"/>
@foreach($product->images as $image)
@if($loop->index == 0)
    @php
        $width = $image->sizes->large->width;
        $height = $image->sizes->large->height;
        $image_small  = $image->url.$image->sizes->small->path;
        $width_small  = $image->sizes->small->width;
        $height_small = $image->sizes->small->height;
    @endphp
<meta property="og:image" content="{{$image_small}}"/>
    <meta property="og:image:secure_url" content="{{$image_small}}"/>
    <meta property="og:image:width" content="{{$width}}"/>
    <meta property="og:image:height" content="{{$height}}"/>
@endif
@endforeach
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('img/favicon.png')}}" />
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{asset('details/css/plugins.css')}}">
    <!-- Bootstap CSS -->
    <link rel="stylesheet" href="{{asset('details/css/bootstrap.min.css')}}">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('details/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('details/css/responsive.css')}}">
</head>
<body class="template-product belle">
    <div class="pageWrapper">
        <!--Body Content-->
        <div id="page-content">
            <!--MainContent-->
            <div id="MainContent" class="main-content" role="main">

                <div id="ProductSection-product-template" class="product-template__container prstyle1 container">
                    <!--product-single-->
                    <div class="product-single">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="product-details-img">
                                    <div class="product-thumb">
                                        <div id="gallery" class="product-dec-slider-2 product-tab-left">
                                            @foreach($product->images as $image)
                                                <a data-image="{{$image->url.$image->sizes->orig->path}}" data-zoom-image="{{$image->url.$image->sizes->orig->path}}" class="slick-slide slick-cloned" data-slick-index="{{$loop->index}}" aria-hidden="true" tabindex="-1">
                                                    <img class="blur-up lazyload" data-src="{{$image->url.$image->sizes->small->path}}" src="{{$image->url.$image->sizes->small->path}}" alt="" />
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="zoompro-wrap product-zoom-right pl-20">
                                        <div class="zoompro-span">
                                            @foreach($product->images as $image)
                                                @if($loop->index == 0)
                                                    <img class="blur-up lazyload zoompro" data-zoom-image="{{$image->url.$image->sizes->orig->path}}" alt="" src="{{$image->url.$image->sizes->orig->path}}" />
                                                @endif

                                            @endforeach
                                        </div>
                                        <div class="product-buttons">
                                            <a href="#" class="btn prlightbox" title="Ampliar">
                                                <i class="icon anm anm-expand-l-arrows" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="lightboximages">
                                        @foreach($product->images as $image)
                                            <a href="{{$image->url.$image->sizes->orig->path}}" data-size="{{$image->sizes->orig->width}}x{{$image->sizes->orig->height}}"></a>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12" style="height: {{$height+10}}px">
                                <div class="product-single__meta">
                                    <h1 class="product-single__title">{{$product->name}}</h1>
                                </div>
                                <div class="product-single__description rte">
                                    <ul>
                                        <li>{{$product->description}}</li>
                                        <li>{{$product->composition}}</li>
                                    </ul>
                                </div>
                                <form class="product-form product-form-product-template hidedropdown">
                                    {{--
                                    <div class="swatch clearfix swatch-0 option1" data-option-index="0">
                                        <div class="product-form__item">
                                            <label class="header">Fotos: <span class="slVariant">Modelo</span></label>
                                            @foreach($product->images as $image)
                                                <div data-value="pos_{{$loop->index+1}}" class="swatch-element color pos_{{$loop->index+1}} available">
                                                    <input class="swatchInput" id="swatch-0-pos_{{$loop->index+1}}" type="radio" name="option-0" value="pos_{{$loop->index+1}}">
                                                    <label class="swatchLbl color medium rectangle" for="swatch-0-pos_{{$loop->index+1}}" style="background-image:url({{$image->url.$image->sizes->small->path}});" title="{{$product->name}} {{$loop->index+1}}"></label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    --}}
                                    <div class="swatch clearfix swatch-1 option2" data-option-index="1">
                                        <div class="product-form__item">
                                            <label class="header"> <span class="slVariant">Grade:</span></label>
                                            @foreach($product->packs as $packs)
                                                @foreach($packs->pack_sizes as $size)
                                                    <div data-value="{{$size}}" class="swatch-element {{$size}} available">
                                                        <input class="swatchInput" id="swatch-1-{{$size}}" type="radio" name="option-1" value="{{$size}}">
                                                        <label class="swatchLbl medium rectangle" for="swatch-1-{{$size}}" title="{{$size}}">{{$size}}</label>
                                                    </div>
                                                @endforeach
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="product-action clearfix">
                                        <div class="product-form__item--submit">
                                            <button type="button" onclick="goShopping(9, '{{$product->id}}', 'product-form__cart-submit');" class="btn product-form__cart-submit">
                                                <span>COMPRAR ONLINE</span>
                                            </button>
                                        </div>
                                    </div>
                                    <input type="hidden" name="product_id" value="{{$product->id}}">

                                </form>
                                {{--
                                <div id="quantity_message">COMPARTILHE COM SEU CLIENTE.</div>

                                <div class="display-table shareRow">
                                    <div class="display-table-cell text-left">
                                        <div class="social-sharing">
                                            @foreach($socials as $social)
                                                @if($social->name == 'facebook' && $social->active == 1)

                                                    <a href="javascript:void(0)" onclick="socialShare(3, '{{$product->id}}');" class="btn btn--small btn--secondary btn--share share-facebook" title="Facebook">
                                                        <i class="fa fa-facebook-square" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Facebook</span>
                                                    </a>
                                                @endif
                                                @if($social->name == 'twitter' && $social->active == 1)
                                                    <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-twitter" title="Tweet on Twitter">
                                                        <i class="fa fa-twitter" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Tweet</span>
                                                    </a>
                                                @endif
                                                @if($social->name == 'google' && $social->active == 1)
                                                    <a href="#" title="Share on google+" class="btn btn--small btn--secondary btn--share" >
                                                        <i class="fa fa-google-plus" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Google</span>
                                                    </a>
                                                @endif
                                                @if($social->name == 'whatsapp' && $social->active == 1)
                                                    <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-whatsapp" title="Whatsapp">
                                                        <i class="fa fa-whatsapp" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Whatsapp</span>
                                                    </a>
                                                @endif
                                                @if($social->name == 'instagram' && $social->active == 1)
                                                    <a href="#" class="btn btn--small btn--secondary btn--share share-instagram" title="Instagram" target="_blank">
                                                        <i class="fa fa-instagram" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Instagram</span>
                                                    </a>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                --}}
                            </div>
                        </div>
                    </div>
                </div>
                <!--#ProductSection-product-template-->
            </div>
            <!--MainContent-->
        </div>

        <!-- Including Jquery -->
        <script src="{{asset('details/js/jquery-3.3.1.min.js')}}"></script>
        <script src="{{asset('details/js/jquery.cookie.js')}}"></script>
        <script src="{{asset('details/js/modernizr-3.6.0.min.js')}}"></script>
        <script src="{{asset('details/js/wow.min.js')}}"></script>
        <!-- Including Javascript -->
        <script src="{{asset('details/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('details/js/plugins.js')}}"></script>
        <script src="{{asset('details/js/popper.min.js')}}"></script>
        <script src="{{asset('details/js/lazysizes.js')}}"></script>
        <script src="{{asset('details/js/main.js')}}"></script>
        <script src="{{asset('js/social.js')}}?{{time()}}"></script>
        <!-- Photoswipe Gallery -->
        <script src="{{asset('details/js/photoswipe.min.js')}}"></script>
        <script src="{{asset('details/js/photoswipe-ui-default.min.js')}}"></script>

        <script>
            $(function(){
                var $pswp = $('.pswp')[0],
                    image = [],
                    getItems = function() {
                        var items = [];
                        $('.lightboximages a').each(function() {
                            var $href   = $(this).attr('href'),
                                $size   = $(this).data('size').split('x'),
                                item = {
                                    src : $href,
                                    w: $size[0],
                                    h: $size[1]
                                }
                            items.push(item);
                        });
                        return items;
                    }
                var items = getItems();

                $.each(items, function(index, value) {
                    image[index]     = new Image();
                    image[index].src = value['src'];
                });
                $('.prlightbox').on('click', function (event) {
                    event.preventDefault();

                    var $index = $(".active-thumb").parent().attr('data-slick-index');
                    $index++;
                    $index = $index-1;

                    var options = {
                        index: $index,
                        bgOpacity: 0.9,
                        showHideOpacity: true
                    }
                    var lightBox = new PhotoSwipe($pswp, PhotoSwipeUI_Default, items, options);
                    lightBox.init();
                });
            });
        </script>

        <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="pswp__bg"></div>
            <div class="pswp__scroll-wrap">
                <div class="pswp__container">
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                </div>
                <div class="pswp__ui pswp__ui--hidden">
                    <div class="pswp__top-bar">
                        <div class="pswp__counter"></div>
                        <button class="pswp__button pswp__button--close" title="Fechar (Esc)"></button>
                        <button class="pswp__button pswp__button--share" title="Compartilhar"></button>
                        <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                        <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                        <div class="pswp__preloader">
                            <div class="pswp__preloader__icn">
                                <div class="pswp__preloader__cut">
                                    <div class="pswp__preloader__donut"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                        <div class="pswp__share-tooltip"></div>
                    </div>
                    <button class="pswp__button pswp__button--arrow--left" title="Anterior (arrow left)"></button>
                    <button class="pswp__button pswp__button--arrow--right" title="Proximo (arrow right)"></button>
                    <div class="pswp__caption">
                        <div class="pswp__caption__center"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
</html>