<section class="projectmanager" id="projectmanager">
    <!-- Section Overlay Starts -->
    <div class="section-overlay">
        <!-- Container Starts -->
        <div class="container">
            <div class="row">
                <!-- Image Starts -->
                <div class="col-md-12 col-lg-12 col-xl-5">
                    <img class="img-fluid projectmanagerpicture" src="img/revendedor/revenda-tnw-jeans.png" alt="project manager">
                </div>
                <!-- Image Ends -->
                <!-- Details Starts -->
                <div class="col-md-12 col-lg-12 col-xl-6 offset-xl-1">
                    <h2>SEJA UM REVENDEDOR</h2>
                    <strong>Moda feminina, masculina e plus size.</strong> </br>
                    È muito simples se cadastre através do nosso aplicativo, com seguintes documentos CPF ou CNPJ. Mínimo para compras 24 peças; sendo 3 por modelo ( tamanhos variados).</br>
                    Compras online baixe o aplicativo tnw jeans , entrega para todo território nacional brasileiro.
                    <p><strong>Compromissos com nossos clientes</strong></p> 
                    <blockquote>                        
                        Atendimento eficiente e rápido nas entregas das vendas, ou em caso de troca e devolução; equipe preparadas para resolverem possíveis adversidades com nossos clientes. Pensando sempre na qualidade de todos nossos serviços oferecidos.</br>
                        Entre em contato conosco através do WhatsApp (11) 2081-4360
                        E tire todas suas dúvidas para se tornar um revendedor da TNW jeans.</br>
                    </blockquote>
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
                        <!-- Social Media Ends -->
                    @endif
                </div>
            </div>
            <!-- Details Ends -->
        </div>
        <!-- Container Ends -->
    </div>
</section>