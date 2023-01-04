<div>
        <div class="footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <h4 class="footer-heading">{{ $appSettings->website_name ?? 'Alvine-Ecom' }}</h4>
                        <div class="footer-underline"></div>
                        <p>
                            {{ $appSettings->website_description }}
                        </p>
                    </div>
                    <div class="col-md-3">
                        <h4 class="footer-heading">Quick Links</h4>
                        <div class="footer-underline"></div>
                        <div class="mb-2"><a href="{{ url('') }}" class="text-white">Home</a></div>
                        <div class="mb-2"><a href="#" class="text-white">About Us</a></div>
                        <div class="mb-2"><a href="#" class="text-white">Contact Us</a></div>
                        <div class="mb-2"><a href="#" class="text-white">Blogs</a></div>
                        <div class="mb-2"><a href="#" class="text-white">Sitemaps</a></div>
                    </div>
                    <div class="col-md-3">
                        <h4 class="footer-heading">Shop Now</h4>
                        <div class="footer-underline"></div>
                        <div class="mb-2"><a href="{{ url('collections') }}" class="text-white">Collections</a></div>
                        <div class="mb-2"><a href="{{ url('trending_products') }}" class="text-white">Trending Products</a></div>
                        <div class="mb-2"><a href="{{ url('new_arrivals') }}" class="text-white">New Arrivals Products</a></div>
                        <div class="mb-2"><a href="{{ url('featured_products') }}" class="text-white">Featured Products</a></div>
                        <div class="mb-2"><a href="{{ url('view_cart') }}" class="text-white">Cart</a></div>
                    </div>
                    <div class="col-md-3">
                        <h4 class="footer-heading">Reach Us</h4>
                        <div class="footer-underline"></div>
                        <div class="mb-2">
                            <p>
                                <i class="fa fa-map-marker"></i>
                                {{ $appSettings->address ?? 'Kenyatta Avenue, Alvine Building, tom-mboya streets, Nairobi, Kenya - 560077' }} 
                            </p>
                        </div>
                        <div class="mb-2">
                            <a href="" class="text-white">
                                <i class="fa fa-phone"></i>{{ $appSettings->phone1 ?? ' +2547 12 135 643' }}
                            </a>
                        </div>
                        <div class="mb-2">
                            <a href="" class="text-white">
                                <i class="fa fa-envelope"></i> {{ $appSettings->email1 ?? 'alvinellavu@gmail.com' }} 
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <p class=""> &copy; {{ now()->format('Y') }} {{ $appSettings->website_name ?? 'Alvine-Ecom' }}. All rights reserved.</p>
                    </div>
                    <div class="col-md-4">
                        <div class="social-media">
                            Get Connected:
                            {{ $appSettings->phone1 ?? ' +2547 12 135 643' }}
                            @if ($appSettings->facebook)
                            <a target="_blank" href="{{ $appSettings->facebook }}"><i class="fa fa-facebook"></i></a>
                            @endif
                            @if ($appSettings->twitter)
                            <a target="_blank" href="{{ $appSettings->twitter }}"><i class="fa fa-twitter"></i></a>                                                           
                            @endif
                            @if ($appSettings->instagram)
                            <a target="_blank" href="{{ $appSettings->instagram }}"><i class="fa fa-instagram"></i></a>                                                           
                            @endif
                            @if ($appSettings->youtube)
                                 <a target="_blank" href="{{ $appSettings->youtube }}"><i class="fa fa-youtube"></i></a>                          
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>