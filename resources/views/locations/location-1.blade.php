<section id="lacalizacao" class="contact">
    <div class="container">
        <div class="text-center top-text">
            <h1><span>Mapa</span> Localização</h1>
        </div>
    </div>
    <div class="info-map">
        <div class="google-map">
            <div class="gmap_container">
                <div><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.911483291344!2d-46.61594798502268!3d-23.535685884695738!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd5c4e2bd5c72417c!2sTNW%20Jeans!5e0!3m2!1sen!2sbr!4v1652714382548!5m2!1sen!2sbr" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row info-map-boxes">
            <div class="col-md-4 col-sm-12">
                <div class="info-map-boxes-item fa fa-map-marker">
                    <h1>ENDEREÇO</h1>
                    <h1>
                        @if($configSite->color_style == 'dark')
                            <span class="text-light">{{ $configCompany->address }} </span><br>
                            <span class="text-light">{{ $configCompany->district }} - {{ $configCompany->city }}</span>
                        @else
                            <span class="text-dark">{{ $configCompany->address }} </span><br>
                            <span class="text-dark">{{ $configCompany->district }} - {{ $configCompany->city }}</span>
                        @endif
                    </h1>
                </div>
            </div>

            <div class="col-md-4 col-sm-12">
                <div class="info-map-boxes-item fa fa fa-clock-o">
                    <h1>NOSSO HORÁRIO:</h1>
                    <h5>
                        @if($configSite->color_style == 'dark')
                            <span class="text-light">{{ $configCompany->horary->weekday }}</span><br><br>
                            <span class="text-light">{{ $configCompany->horary->saturday }}</span>
                        @else
                            <span class="text-dark">{{ $configCompany->horary->weekday }}</span><br><br>
                            <span class="text-dark">{{ $configCompany->horary->saturday }}</span>
                        @endif
                    </h5>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="info-map-boxes-item fa fa-comments-o">
                    <h1> CONTATOS </h1>
                    <h1>
                        @if($configSite->color_style == 'dark')
                            <span class="text-light">{{$configCompany->whatsapp}}</span> <i class="fa fa-whatsapp text-success" aria-hidden="true"></i> <br>
                            {{-- <span class="text-light">{{$configCompany->phone}}</span> <i class="fa fa-phone" aria-hidden="true"></i> --}}
                        @else
                            <span class="text-dark">{{$configCompany->whatsapp}}</span> <i class="fa fa-whatsapp text-success" aria-hidden="true"></i> <br>
                            {{-- <span class="text-dark">{{$configCompany->phone}}</span> <i class="fa fa-phone" aria-hidden="true"></i> --}}
                        @endif
                    </h1>
                    <p>
                        <br>
                        <a href="#" class="cryptedmail"
                           data-name="contato"
                           data-domain="tnwjeans"
                           data-tld="com.br"
                           onclick="window.location.href = 'mailto:' + this.dataset.name + '@' + this.dataset.domain + '.' + this.dataset.tld; return false;">
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>