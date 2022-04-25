<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    @stack('title')
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Google Fonts
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    -->
    <link href="https://fonts.googleapis.com/css2?family=Jockey:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('img/favicon.png')}}">

    <!-- Template CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/magnific-popup.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/skins/'.$configSite->color.'.css')}}" />

    <!-- Revolution Slider CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{asset('js/plugins/revolution/css/settings.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('js/plugins/revolution/css/layers.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('js/plugins/revolution/css/navigation.css')}}" />

    <!-- Live Style Switcher - demo only -->
    <link rel="alternate stylesheet" type="text/css" title="blue" href="{{asset('css/skins/blue.css')}}" />
    <link rel="alternate stylesheet" type="text/css" title="blueviolet" href="{{asset('css/skins/blueviolet.css')}}" />
    <link rel="alternate stylesheet" type="text/css" title="goldenrod" href="{{asset('css/skins/goldenrod.css')}}" />
    <link rel="alternate stylesheet" type="text/css" title="green" href="{{asset('css/skins/green.css')}}" />
    <link rel="alternate stylesheet" type="text/css" title="magenta" href="{{asset('css/skins/magenta.css')}}" />
    <link rel="alternate stylesheet" type="text/css" title="orange" href="{{asset('css/skins/orange.css')}}" />
    <link rel="alternate stylesheet" type="text/css" title="purple" href="{{asset('css/skins/purple.css')}}" />
    <link rel="alternate stylesheet" type="text/css" title="red" href="{{asset('css/skins/red.css')}}" />
    <link rel="alternate stylesheet" type="text/css" title="yellow" href="{{asset('css/skins/yellow.css')}}" />
    <link rel="alternate stylesheet" type="text/css" title="yellowgreen" href="{{asset('css/skins/yellowgreen.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/styleswitcher.css')}}" />
    {{-- Whatsapp CSS --}}
    <link rel="stylesheet" type="text/css" href="{{asset('js/plugins/whatsapp/css/whatsapp.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('js/plugins/whatsapp/countries/css/countrySelect.css')}}" />
    <!-- Template JS Files -->
    <script type="text/javascript" src="{{asset('js/modernizr.js')}}"></script>

</head>
@stack('body')
@yield('content')
<!-- Template JS Files -->
<script type="text/javascript" src="{{asset('js/jquery-2.2.4.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/jquery.easing.1.3.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyBwHd3TaultTp6VGM5GN1eg8f8MySG5CO4"></script>
<script type="text/javascript" src="{{asset('js/plugins/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/jquery.bxslider.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/jquery.filterizr.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/jquery.magnific-popup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/jquery.singlePageNav.min.js')}}"></script>

<!-- Revolution Slider Main JS Files -->
<script type="text/javascript" src="{{asset('js/plugins/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>

<!-- Revolution Slider Extensions -->

<script type="text/javascript" src="{{asset('js/plugins/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/revolution/js/extensions/revolution.extension.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/inputmask/jquery.inputmask.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/inputmask/inputmask.binding.js')}}"></script>
{{-- Whatsapp --}}
<script type="text/javascript" src="{{asset('js/plugins/whatsapp/js/custom-whatsapp.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/whatsapp/countries/js/countrySelect.js')}}"></script>
<!-- Live Style Switcher JS File - only demo -->
<script type="text/javascript" src="{{asset('js/styleswitcher.js')}}"></script>

<!-- Main JS Initialization File -->
<script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
<script type="text/javascript" src="{{asset('js/social.js')}}?{{time()}}"></script>

<!-- Revolution Slider Initialization Starts -->
<script>
    (function() {
        "use strict";
        // REVOLUTION SLIDER
        var tpj = jQuery;
        var revapi4;
        tpj(document).ready(function() {
            if (tpj("#rev_slider").revolution == undefined) {
                revslider_showDoubleJqueryError("#rev_slider");
            } else {
                revapi4 = tpj("#rev_slider").show().revolution({
                    sliderType: "standard",
                    jsFileLocation: "js/plugins/revolution/js/",
                    dottedOverlay: "none",
                    sliderLayout: "fullscreen",
                    delay: 9000,
                    navigation: {
                        keyboardNavigation: "off",
                        keyboard_direction: "horizontal",
                        mouseScrollNavigation: "off",
                        onHoverStop: "off",
                        touch: {
                            touchenabled: "on",
                            swipe_threshold: 75,
                            swipe_min_touches: 1,
                            swipe_direction: "horizontal",
                            drag_block_vertical: false
                        },
                        arrows: {
                            style: "zeus",
                            enable: true,
                            hide_onmobile: true,
                            hide_under: 600,
                            hide_onleave: true,
                            hide_delay: 200,
                            hide_delay_mobile: 1200,
                            tmp: '<div class="tp-title-wrap">  	<div class="tp-arr-imgholder"></div> </div>',
                            left: {
                                h_align: "left",
                                v_align: "center",
                                h_offset: 90,
                                v_offset: 0
                            },
                            right: {
                                h_align: "right",
                                v_align: "center",
                                h_offset: 90,
                                v_offset: 0
                            }
                        },
                        bullets: {
                            enable: false,
                            hide_onmobile: true,
                            hide_under: 600,
                            style: "metis",
                            hide_onleave: true,
                            hide_delay: 200,
                            hide_delay_mobile: 1200,
                            direction: "horizontal",
                            h_align: "center",
                            v_align: "bottom",
                            h_offset: 0,
                            v_offset: 30,
                            space: 5,
                            tmp: '<span class="tp-bullet-img-wrap">  <span class="tp-bullet-image"></span></span>'
                        }
                    },
                    viewPort: {
                        enable: true,
                        outof: "pause",
                        visible_area: "80%"
                    },
                    responsiveLevels: [1240, 1024, 778, 480],
                    gridwidth: [1240, 1024, 778, 480],
                    gridheight: [600, 600, 500, 400],
                    lazyType: "none",
                    parallax: {
                        type: "mouse",
                        origo: "slidercenter",
                        speed: 2000,
                        levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50],
                    },
                    shadow: 0,
                    spinner: "off",
                    stopLoop: "off",
                    stopAfterLoops: -1,
                    stopAtSlide: -1,
                    shuffle: "off",
                    hideThumbsOnMobile: "off",
                    autoHeight: "off",
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    debugMode: false,
                    fallbacks: {
                        simplifyAll: "off",
                        nextSlideOnWindowFocus: "off",
                        disableFocusListener: false,
                    }
                });
            }
        });

        // GOOGLE MAP
        function init_map() {

            var myOptions = {
                scrollwheel: false,
                zoom: 18,
                center: new google.maps.LatLng(-23.5356575, -46.6138154,),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
            var marker = new google.maps.Marker({
                map: map,
                icon: "img/markers/orange.png",
                position: new google.maps.LatLng(-23.5356575, -46.6138154,)
            });
            var infowindow = new google.maps.InfoWindow({
                content: "<strong>{{$configCompany->fantasy}}</strong><br>{{$configCompany->fantasy}}  {{$configCompany->address}} - {{$configCompany->district}}-{{$configCompany->state}}<br>"
            });
            google.maps.event.addListener(marker, "click", function() {
                infowindow.open(map, marker);
            });
        }
        google.maps.event.addDomListener(window, "load", init_map);

    })(jQuery);

</script>
{{-- Configuração do select paises do Whatsapp--}}
<script>
    $("#country_selector").countrySelect({
        defaultCountry: "br",
        preferredCountries: ['ar', 'bo', 'cl', 'co']
    });
</script>
<script>
    const logged = window.localStorage.getItem('vestiwebstore_loginData_tnw');
    if(user){
        console.log('Estou Logado')
    } else {
        console.log('Não estou logado porra')
    }
</script>
</body>

</html>
