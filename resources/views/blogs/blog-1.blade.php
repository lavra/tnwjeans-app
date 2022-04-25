<section class="blog" id="instagram">
    <div class="container">
        <div class="text-center top-text">
            <h1><span><i class="fa fa-instagram"></i></span> instagram</h1>
        </div>
        <div class="row latest-posts-content">
            @foreach($instagram as $item)
                <div class="col-sm-12 col-md-4 col-xs-12">
                    <div class="latest-post">
                        <a class="img-thumb" target="_blank" href="{{$item->url}}"><img class="img-fluid" src="{{$item->image}}" alt="img"></a>
                        <div class="post-date">
                            <span>{{$item->likes}}</span>
                            <span><i class="fa fa-heart-o"></i></span>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="mx-auto">
                <a class="custom-button link-blog" href="blog.html">Ver Mais</a>
            </div>
        </div>
    </div>
</section>
