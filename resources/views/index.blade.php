@extends('layouts.master')



@section('title')
    Footcase
@endsection

@section('css')
@endsection

@section('content')
    <!-- start banner Area -->
    <section class="banner-area">
        <div class="container">
            <div class="row fullscreen align-items-center">
                <div class="col-lg-12">
                    <div class="active-banner-slider owl-carousel">
                        <!-- single-slide -->
                        <div class="row single-slide align-items-center d-flex">
                            <div class="col-lg-5 col-md-6">
                                <div class="banner-content">
                                    <h1>Footcase New <br />Collection!</h1>
                                    <p style="color:black">
                                        Footcase are known for their versatile style that combines
                                        comfort and fashion. They come in a wide variety of
                                        designs, colors, and patterns, catering to different
                                        tastes and preferences. From classic retro styles to
                                        modern and futuristic designs, sneakers offer a range of
                                        options to suit various outfits and occasions.
                                    </p>
                                    <div class="add-bag d-flex align-items-center">
                                        <a class="add-btn" href="{{ url('cart') }}">
                                            <span class="lnr lnr-cross"></span>
                                        </a>
                                        <span class="add-text text-uppercase">Add to Bag</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="banner-img">
                                    <img class="img-fluid" src="{{ asset('img/banner/banner-img.png') }}" alt="" />
                                </div>
                            </div>
                        </div>
                        <!-- single-slide -->
                        <div class="row single-slide align-items-center d-flex">
                            <div class="col-lg-5 col-md-6">
                                <div class="banner-content">
                                    <h1>Footcase New <br />Collection!</h1>
                                    <p style="color:black">
                                        Footcase are known for their versatile style that combines
                                        comfort and fashion. They come in a wide variety of
                                        designs, colors, and patterns, catering to different
                                        tastes and preferences. From classic retro styles to
                                        modern and futuristic designs, sneakers offer a range of
                                        options to suit various outfits and occasions.
                                    </p>
                                    <div class="add-bag d-flex align-items-center">
                                        <a class="add-btn" href="{{ url('cart') }}"><span
                                                class="lnr lnr-cross"></span></a>
                                        <span class="add-text text-uppercase">Add to Bag</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="banner-img">
                                    <img class="img-fluid" src="{{ asset('img/banner/banner-img.png') }}" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section_gap">
        <div class="single-product-slider">

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div class="section-title">
                            <h1>Latest Footwear</h1>
                            <p>Matrix, From Sole to Soul, Be the King of Style!</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- single product -->
                    @foreach ($products as $product)
                        <div class="col-lg-3 col-md-6">
                            <div class="single-product">
                                <img class="img-fluid" src="{{ asset('uploads/' . $product->product_image) }}"
                                    alt="product_image" />
                                <div class="product-details">
                                    <h6>{{ $product->sku }}</h6>
                                    <div class="price">
                                        <h6>Size: {{ $product->size_no }}</h6>
                                        <h6>Rs. {{ $product->price }}</h6>
                                    </div>
                                    <div class="prd-bottom">
                                        <a href="javascript:void(0)" class="social-info add-to-cart-btn"
                                            auth="{{ Auth::check() ? json_encode(Auth::user()) : null }}"
                                            data-product-id="{{ $product->id }}">
                                            <span class="ti-bag"></span>
                                            <p class="hover-text">add to bag</p>
                                        </a>
                                        <a href="{{ url('product-detail/' . $product->id) }}" class="social-info">
                                            <span class="lnr lnr-move"></span>
                                            <p class="hover-text ">view more</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                    {{-- "Modal " --}}

                    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">

                                <div class="">
                                    <button type="button" class="close align-self-end m-2" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <div class="login_form_inner">
                                        <h3>Log in</h3>
                                        <form class="row login_form" method="post" id="loginForm">
                                            @csrf
                                            <div class="col-md-12 form-group">
                                                <input type="text" class="form-control" id="email" name="email"
                                                    placeholder="Email" onfocus="this.placeholder = ''"
                                                    onblur="this.placeholder = 'Email'" />
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <input type="text" class="form-control" id="password" name="password"
                                                    placeholder="Password" onfocus="this.placeholder = ''"
                                                    onblur="this.placeholder = 'Password'" />
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <div class="creat_account">
                                                    <input type="checkbox" id="f-option2" name="selector" />
                                                    <label for="f-option2">Keep me logged in</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <button type="submit" value="submit" class="primary-btn">
                                                    Log In
                                                </button>
                                                <a href="">Forgot Password?</a>

                                            </div>
                                        </form>
                                        <div class="d-flex row justify-content-center py-2"><span>Don't have a
                                                account? </span><a href="">
                                                &nbsp;&nbsp;SignUp</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- single product -->

                    <!-- single product -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img class="img-fluid" src="{{ asset('img/product/p5.jpg') }}" alt="" />
                            <div class="product-details">
                                <h6>Matrix New Hammer sole for Sports person</h6>
                                <div class="price">
                                    <h6>Rs. 2999.00</h6>
                                    <h6 class="l-through">Rs. 5000.00</h6>
                                </div>
                                <div class="prd-bottom">
                                    <a href="login.html" target="_blank" class="social-info">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">add to bag</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-heart"></span>
                                        <p class="hover-text">Wishlist</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-sync"></span>
                                        <p class="hover-text">compare</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-move"></span>
                                        <p class="hover-text">view more</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single product -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img class="img-fluid" src="{{ asset('img/product/p1.jpg') }}" alt="" />
                            <div class="product-details">
                                <h6>Matrix New Hammer sole for Sports person</h6>
                                <div class="price">
                                    <h6>Rs. 2999.00</h6>
                                    <h6 class="l-through">Rs. 5000.00</h6>
                                </div>
                                <div class="prd-bottom">
                                    <a href="login.html" target="_blank" class="social-info">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">add to bag</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-heart"></span>
                                        <p class="hover-text">Wishlist</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-sync"></span>
                                        <p class="hover-text">compare</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-move"></span>
                                        <p class="hover-text">view more</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single product -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img class="img-fluid" src="{{ asset('img/product/p4.jpg') }}" alt="" />
                            <div class="product-details">
                                <h6>Matrix New Hammer sole for Sports person</h6>
                                <div class="price">
                                    <h6>Rs. 2999.00</h6>
                                    <h6 class="l-through">Rs. 5000.00</h6>
                                </div>
                                <div class="prd-bottom">
                                    <a href="login.html" target="_blank" class="social-info">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">add to bag</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-heart"></span>
                                        <p class="hover-text">Wishlist</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-sync"></span>
                                        <p class="hover-text">compare</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-move"></span>
                                        <p class="hover-text">view more</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single product -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img class="img-fluid" src="{{ asset('img/features/f-icon3.png') }}" alt="" />
                            <div class="product-details">
                                <h6>Matrix New Hammer sole for Sports person</h6>
                                <div class="price">
                                    <h6>Rs. 2999.00</h6>
                                    <h6 class="l-through">Rs. 5000.00</h6>
                                </div>
                                <div class="prd-bottom">
                                    <a href="login.html" target="_blank" class="social-info">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">add to bag</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-heart"></span>
                                        <p class="hover-text">Wishlist</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-sync"></span>
                                        <p class="hover-text">compare</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-move"></span>
                                        <p class="hover-text">view more</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single product -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img class="img-fluid" src="{{ asset('img/product/p8.jpg') }}" alt="" />
                            <div class="product-details">
                                <h6>Matrix New Hammer sole for Sports person</h6>
                                <div class="price">
                                    <h6>Rs. 2999.00</h6>
                                    <h6 class="l-through">Rs. 5000.00</h6>
                                </div>
                                <div class="prd-bottom">
                                    <a href="login.html" target="_blank" class="social-info">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">add to bag</p>
                                    </a>
                                    <a class="social-info">
                                        <span class="lnr lnr-heart"></span>
                                        <p class="hover-text">Wishlist</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-sync"></span>
                                        <p class="hover-text">compare</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-move"></span>
                                        <p class="hover-text">view more</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="owl-carousel active-product-area">
        <!-- single product slide -->
        @foreach ($categoriesProduct as $category)
            <div class="single-product-slider">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 text-center">
                            <div class="section-title">
                                <h1>{{ $category->title }} Footwear</h1>
                                <p>Matrix, From Sole to Soul, Be the King of Style!</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- single product -->

                        @foreach ($category->products as $product)
                            <div class="col-lg-3 col-md-6">
                                <div class="single-product">
                                    <img class="img-fluid" src="{{ asset('uploads/' . $product->product_image) }}"
                                        alt="product_image" />
                                    <div class="product-details">
                                        <h6>{{ $product->sku }}</h6>
                                        <div class="price">
                                            <h6>Size: {{ $product->size_no }}</h6>
                                            <h6>Rs. {{ $product->price }}</h6>
                                        </div>
                                        <div class="prd-bottom">
                                            <a href="javascript:void(0)" class="social-info add-to-cart-btn"
                                                auth="{{ Auth::check() ? 1 : 0 }}">
                                                <span class="ti-bag"></span>
                                                <p class="hover-text">add to bag</p>
                                            </a>
                                            <a href="{{ url('product-detail/' . $product->id) }}" class="social-info">
                                                <span class="lnr lnr-move"></span>
                                                <p class="hover-text">view more</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
        <!-- single product slide -->
        <div class="single-product-slider">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div class="section-title">
                            <h1>Coming Products</h1>
                            <p>Matrix, From Sole to Soul, Be the King of Style!</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- single product -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img class="img-fluid" src="{{ asset('img/product/p6.jpg') }}" alt="" />
                            <div class="product-details">
                                <h6>Matrix New Hammer sole for Sports person</h6>
                                <div class="price">
                                    <h6>Rs. 2999.00</h6>
                                    <h6 class="l-through">Rs. 5000.00</h6>
                                </div>
                                <div class="prd-bottom">
                                    <a href="login.html" target="_blank" class="social-info">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">add to bag</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-heart"></span>
                                        <p class="hover-text">Wishlist</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-sync"></span>
                                        <p class="hover-text">compare</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-move"></span>
                                        <p class="hover-text">view more</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single product -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img class="img-fluid" src="{{ asset('img/product/p8.jpg') }}" alt="" />
                            <div class="product-details">
                                <h6>Matrix New Hammer sole for Sports person</h6>
                                <div class="price">
                                    <h6>Rs. 2999.00</h6>
                                    <h6 class="l-through">Rs. 5000.00</h6>
                                </div>
                                <div class="prd-bottom">
                                    <a href="login.html" target="_blank" class="social-info">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">add to bag</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-heart"></span>
                                        <p class="hover-text">Wishlist</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-sync"></span>
                                        <p class="hover-text">compare</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-move"></span>
                                        <p class="hover-text">view more</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single product -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img class="img-fluid" src="{{ asset('img/product/p3.jpg') }}" alt="" />
                            <div class="product-details">
                                <h6>Matrix New Hammer sole for Sports person</h6>
                                <div class="price">
                                    <h6>Rs. 2999.00</h6>
                                    <h6 class="l-through">Rs. 5000.00</h6>
                                </div>
                                <div class="prd-bottom">
                                    <a href="login.html" target="_blank" class="social-info">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">add to bag</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-heart"></span>
                                        <p class="hover-text">Wishlist</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-sync"></span>
                                        <p class="hover-text">compare</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-move"></span>
                                        <p class="hover-text">view more</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single product -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img class="img-fluid" src="{{ asset('img/product/p5.jpg') }}" alt="" />
                            <div class="product-details">
                                <h6>Matrix New Hammer sole for Sports person</h6>
                                <div class="price">
                                    <h6>Rs. 2999.00</h6>
                                    <h6 class="l-through">Rs. 5000.00</h6>
                                </div>
                                <div class="prd-bottom">
                                    <a href="login.html" target="_blank" class="social-info">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">add to bag</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-heart"></span>
                                        <p class="hover-text">Wishlist</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-sync"></span>
                                        <p class="hover-text">compare</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-move"></span>
                                        <p class="hover-text">view more</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single product -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img class="img-fluid" src="{{ asset('img/product/p1.jpg') }}" alt="" />
                            <div class="product-details">
                                <h6>Matrix New Hammer sole for Sports person</h6>
                                <div class="price">
                                    <h6>Rs. 2999.00</h6>
                                    <h6 class="l-through">Rs. 5000.00</h6>
                                </div>
                                <div class="prd-bottom">
                                    <a href="login.html" target="_blank" class="social-info">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">add to bag</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-heart"></span>
                                        <p class="hover-text">Wishlist</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-sync"></span>
                                        <p class="hover-text">compare</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-move"></span>
                                        <p class="hover-text">view more</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single product -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img class="img-fluid" src="{{ asset('img/product/p4.jpg') }}" alt="" />
                            <div class="product-details">
                                <h6>Matrix New Hammer sole for Sports person</h6>
                                <div class="price">
                                    <h6>Rs. 2999.00</h6>
                                    <h6 class="l-through">Rs. 5000.00</h6>
                                </div>
                                <div class="prd-bottom">
                                    <a href="login.html" target="_blank" class="social-info">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">add to bag</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-heart"></span>
                                        <p class="hover-text">Wishlist</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-sync"></span>
                                        <p class="hover-text">compare</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-move"></span>
                                        <p class="hover-text">view more</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single product -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img class="img-fluid" src="{{ asset('img/features/f-icon3.png') }}" alt="" />
                            <div class="product-details">
                                <h6>Matrix New Hammer sole for Sports person</h6>
                                <div class="price">
                                    <h6>Rs. 2999.00</h6>
                                    <h6 class="l-through">Rs. 5000.00</h6>
                                </div>
                                <div class="prd-bottom">
                                    <a href="login.html" target="_blank" class="social-info">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">add to bag</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-heart"></span>
                                        <p class="hover-text">Wishlist</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-sync"></span>
                                        <p class="hover-text">compare</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-move"></span>
                                        <p class="hover-text">view more</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single product -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img class="img-fluid" src="{{ asset('img/product/p8.jpg') }}" alt="" />
                            <div class="product-details">
                                <h6>Matrix New Hammer sole for Sports person</h6>
                                <div class="price">
                                    <h6>Rs. 2999.00</h6>
                                    <h6 class="l-through">Rs. 5000.00</h6>
                                </div>
                                <div class="prd-bottom">
                                    <a href="login.html" target="_blank" class="social-info">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">add to bag</p>
                                    </a>
                                    <a class="social-info">
                                        <span class="lnr lnr-heart"></span>
                                        <p class="hover-text">Wishlist</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-sync"></span>
                                        <p class="hover-text">compare</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-move"></span>
                                        <p class="hover-text">view more</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <section class="features-area section_gap">
        <div class="container">
            <div class="row features-inner">
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="{{ asset('img/features/f-icon3.png') }}" alt="" />
                        </div>
                        <h6>Free Delivery</h6>
                        {{-- <p>Free Shipping on all order</p> --}}
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="{{ asset('img/features/f-icon2.png') }}" alt="" />
                        </div>
                        <h6>Return Policy</h6>
                        {{-- <p>Free Shipping on all order</p> --}}
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="{{ asset('img/features/f-icon3.png') }}" alt="" />
                        </div>
                        <h6>24/7 Support</h6>
                        {{-- <p>Free Shipping on all order</p> --}}
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="{{ asset('img/features/f-icon3.png') }}" alt="" />
                        </div>
                        <h6>Secure Payment</h6>
                        {{-- <p>Free Shipping on all order</p>       --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end product Area -->

    <!-- Start brand Area -->
    {{-- <section class="brand-area section_gap">
        <div class="container">
            <div class="row">
                <a class="col single-img" href="#">
                    <img class="img-fluid d-block mx-auto" src="{{ asset('img/brand/1.png') }}" alt="" />
                </a>
                <a class="col single-img" href="#">
                    <img class="img-fluid d-block mx-auto" src="{{ asset('img/brand/2.png') }}" alt="" />
                </a>
                <a class="col single-img" href="#">
                    <img class="img-fluid d-block mx-auto" src="{{ asset('img/brand/3.png') }}" alt="" />
                </a>
                <a class="col single-img" href="#">
                    <img class="img-fluid d-block mx-auto" src="{{ asset('img/brand/4.png') }}" alt="" />
                </a>
                <a class="col single-img" href="#">
                    <img class="img-fluid d-block mx-auto" src="{{ asset('img/brand/5.png') }}" alt="" />
                </a>
            </div>
        </div>
   </section>  --}}
    <!-- End brand Area -->
@endsection
@section('script')
@endsection
