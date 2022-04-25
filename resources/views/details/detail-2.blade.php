<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{$product->name}}</title>
    <meta name="description" content="{{$product->description}} - {{$product->composition}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">.
    <meta name="robots" content="index,follow">
    <meta property="og:url" content="{{route('social-detail', ['network' => $network,'id' => $product->id])}}?share=true"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{{$product->name}}"/>
    <meta property="og:description" content="{{$product->description}} - {{$product->composition}}"/>
@foreach($product->images as $image)
@if($loop->index == 0)
@php
    $image_large  = $image->url.$image->sizes->large->path;
    $width_large  = $image->sizes->large->width;
    $height_large = $image->sizes->large->height;
    $image_small  = $image->url.$image->sizes->small->path;
    $width_small  = $image->sizes->small->width;
    $height_small = $image->sizes->small->height;
@endphp
    <meta property="og:image" content="{{$image_small}}"/>
    <meta property="og:image:secure_url" content="{{$image_small}}"/>
    <meta property="og:image:width" content="{{$width_small}}"/>
    <meta property="og:image:height" content="{{$height_small}}"/>
@endif
@endforeach
</head>
<body>
<figure>
    <img class="" src="{{$image_small}}"
    sizes="(max-width: 1024px) 100vw, {{$width_small}}px"
    srcset="{{$image_small}} {{$width_small}}w"
    data-srcset="{{$image_small}} {{$width_small}}w"
    alt="{{$product->description}} - {{$product->composition}}">
</figure>


@if($network == 'facebook')
    <a id="btn-share" href="https://www.facebook.com/sharer/sharer.php?u={{route('social-detail', ['network' => $network, 'id' => $product->id])}}?share=true"></a>

@endif
@if($network == 'whatsapp')
    @if($isMobile)
        <a id="btn-share" href="whatsapp://send?text={{route('social-detail', ['network' => $network, 'id' => $product->id])}}?share=true"></a>
    @else
        <a id="btn-share" href="https://web.whatsapp.com/send?text={{route('social-detail', ['network' => $network, 'id' => $product->id])}}?share=true"></a>
    @endif
@endif
<script>
    setTimeout(function(){
        document.getElementById("btn-share").click();
    }, 1000);
</script>

</body>
</html>