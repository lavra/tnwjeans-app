<section class="projectmanager" id="projectmanager">
    <!-- Section Overlay Starts -->
    <div class="section-overlay">
        <!-- Container Starts -->
        <div class="container">
            <div class="row">
                <!-- Image Starts -->
                <div class="col-md-12 col-lg-12 col-xl-5">
                    <img class="img-fluid projectmanagerpicture" src="img/projectmanager.jpg" alt="project manager">
                </div>
                <!-- Image Ends -->
                <!-- Details Starts -->
                <div class="col-md-12 col-lg-12 col-xl-6 offset-xl-1">
                    <h1>Revendedor</h1>
                    <h3>Faça sua encomenda</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus obcaecati pariatur officiis molestias eveniet harum laudantium sed optio iste. Iste, alias, non libero recusandae fugiat praesentium delectus inventore accusamus veniam!
                    </p>
                    <blockquote>
                        " Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia "
                    </blockquote>
                    @if(!empty($socials))
                        Nos encontre nas redes sociais 
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