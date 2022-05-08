<div class="rev_slider_wrapper fullwidthbanner-container" data-alias="classicslider1" style="margin:0px auto;background-color:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
    <div id="rev_slider" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.0.7">
        <ul>
            @foreach($sliders as $slider)
                @if($slider->page == 2 && $slider->active == 1)
                    <li data-index="rs-{{$loop->index}}" data-transition="boxslide" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="img/lookbook/700x1050/thumb1.jpg" data-rotate="0" data-fsmasterspeed="300" data-fsslotamount="7" data-saveperformance="off" data-title="Intro" data-description="">
                        <img src="{{ url("storage/{$slider->image}") }}" alt="" data-bgposition="top center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                        @include('home.mainslider.includes.classicslider1-text-slider-1')
                    </li>
                @endif
            @endforeach
        </ul>
        <div class="tp-static-layers"></div>
    </div>
</div>
