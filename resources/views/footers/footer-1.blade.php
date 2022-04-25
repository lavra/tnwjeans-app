<footer class="footer text-center">
    <div class="container">
        <p>{{$configCompany->name}}</p>
        <p> {{$configCompany->copyright}}<a href="javascript:void(0);"><img src="{{asset('img/av-design.png')}}" width="50px"></a></p>
        @if(!empty($socials))
            <div class="social-icons">
                <ul class="social">
                    @foreach($socials as $social)
                        @if($social->active == 1)
                            @if($social->id == 9)
                                <li id="footer-shopping-{{$social->id}}">
                                    <a href="javascript:void(0);" class="shopping" onclick="socialFollow(9, 'footer-shopping-{{$social->id}}');" title="comprar"></a>
                                </li>
                            @else
                                <li id="footer-{{$social->name}}-{{$social->id}}">
                                    <a href="javascript:void(0);" class="{{$social->name}}" onclick="socialFollow('{{$social->id}}', 'footer-{{$social->name}}-{{$social->id}}');" title="{{$social->name}}"></a>
                                </li>
                            @endif
                        @endif
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</footer>