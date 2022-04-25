<section id="lacalizacao" class="contact">
    <div class="container">
        <div class="text-center top-text">
            <h1><span>Mapa</span> Localização</h1>
        </div>
    </div>
    <div class="info-map">
        <div class="google-map">
            <div class="gmap_container">
                <div id="gmap_canvas"></div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row info-map-boxes">
            <div class="col-md-4 col-sm-12">
                <div class="info-map-boxes-item fa fa-map-marker">
                    <h1>ENDEREÇO</h1>
                    <h1>
                        <span class="text-dark">{{$configCompany->address}} </span><br>
                        <span class="text-dark">{{$configCompany->district}} - {{$configCompany->city}}</span>
                    </h1>
                </div>
            </div>

            <div class="col-md-4 col-sm-12">
                <div class="info-map-boxes-item fa fa fa-clock-o">
                    <h1>NOSSO HORÁRIO:</h1>
                    <h5>
                        <span class="text-dark"><strong>{{$configCompany->horary->weekday}}</strong></span><br><br>
                        <span class="text-dark"><strong>{{$configCompany->horary->saturday}}</strong></span>
                    </h5>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="info-map-boxes-item fa fa-comments-o">
                    <h1> CONTATOS </h1>
                    <h1>
                        <span class="text-dark">{{$configCompany->whatsapp}}</span> <i class="fa fa-whatsapp text-success" aria-hidden="true"></i> <br>
                        <span class="text-dark">{{$configCompany->phone}}</span> <i class="fa fa-phone" aria-hidden="true"></i>
                    </h1>
                    {{--
                    <p>
                        <br>
                        <a href="#" class="cryptedmail"
                           data-name="contato"
                           data-domain="tnwjeans"
                           data-tld="com.br"
                           onclick="window.location.href = 'mailto:' + this.dataset.name + '@' + this.dataset.domain + '.' + this.dataset.tld; return false;">
                        </a>
                    </p>
                    --}}
                </div>
            </div>
        </div>
    </div>
</section>
