@extends('layouts.landing.home')

@section('content')
<nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
    <div class="container">
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->
<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="category-banners-slider owl-carousel owl-simple owl-nav-inside" data-toggle="owl"
                    data-owl-options='{
                                    "nav": false,
                                    "responsive": {
                                        "768": {
                                            "nav": true
                                        }
                                    }
                                }'>
                    

                    <div class="banner banner-poster">
                        <a href="#">
                            <img src="{{ asset('templateLandings/assets/images/demos/demo-13/banners/banner-8.png') }}"
                                alt="Banner">
                        </a>

                        <div class="banner-content">
                            <h2 class="banner-title">Booking lapangan futsal?</h2><!-- End .banner-subtitle -->
                            <h2 class="banner-title">Hanya di FutsalnyaPadang</h2><!-- End .banner-title -->
                        </div><!-- End .banner-content -->
                    </div><!-- End .banner -->
                    <div class="banner banner-poster">

                        <a href="#">
                            <img src="{{ asset('templateLandings/assets/images/demos/demo-13/banners/banner-7.png') }}"
                                alt="Banner">
                        </a>

                        <div class="banner-content banner-content-right">
                            <h2 class="banner-title">Punya bisnis lapangan futsal?</h2>
                            <h2 class="banner-title">Segera daftarkan disini !</h2>
                            <!-- End .banner-title -->

                        </div><!-- End .banner-content -->
                    </div><!-- End .banner -->
                </div><!-- End .owl-carousel -->
                <div class="mb-3 mb-lg-5"></div><!-- End .mb-3 mb-lg-5 -->

                <div class="cat-blocks-container">
                    <h2 class="title title-border">Kategori Jenis Lapangan</h2>
                    <div class="row">
                        <div class="col-6 col-md-4 col-lg-3">
                            <a href="{{route('landing.sortType', 1)}}" class="cat-block">
                                <figure>
                                    <span>
                                        <img src="{{ asset('templateLandings/assets/images/demos/demo-13/cats/cat-page/01.jpg') }}"
                                            alt="Category image">
                                    </span>
                                </figure>

                                <h3 class="cat-block-title">Lapangan Vynil</h3><!-- End .cat-block-title -->
                            </a>
                        </div><!-- End .col-6 col-md-4 col-lg-3 -->

                        <div class="col-6 col-md-4 col-lg-3">
                            <a href="{{route('landing.sortType', 2)}}" class="cat-block">
                                <figure>
                                    <span>
                                        <img src="{{ asset('templateLandings/assets/images/demos/demo-13/cats/cat-page/002.jpg') }}"
                                            alt="Category image">
                                    </span>
                                </figure>

                                <h3 class="cat-block-title">Lapangan Rumput Sintetis</h3><!-- End .cat-block-title -->
                            </a>
                        </div><!-- End .col-6 col-md-4 col-lg-3 -->

                        <div class="col-6 col-md-4 col-lg-3">
                            <a href="{{route('landing.sortType', 3)}}" class="cat-block">
                                <figure>
                                    <span>
                                        <img src="{{ asset('templateLandings/assets/images/demos/demo-13/cats/cat-page/03.jpg') }}"
                                            alt="Category image">
                                    </span>
                                </figure>

                                <h3 class="cat-block-title">Lapangan Semen</h3><!-- End .cat-block-title -->
                            </a>
                        </div><!-- End .col-6 col-md-4 col-lg-3 -->

                        <div class="col-6 col-md-4 col-lg-3">
                            <a href="{{route('landing.sortType', 4)}}" class="cat-block">
                                <figure>
                                    <span>
                                        <img src="{{ asset('templateLandings/assets/images/demos/demo-13/cats/cat-page/04.jpg') }}"
                                            alt="Category image">
                                    </span>
                                </figure>

                                <h3 class="cat-block-title">Lapangan Parquette</h3><!-- End .cat-block-title -->
                            </a>
                        </div><!-- End .col-6 col-md-4 col-lg-3 -->

                        <div class="col-6 col-md-4 col-lg-3">
                            <a href="{{route('landing.sortType', 5)}}" class="cat-block">
                                <figure>
                                    <span>
                                        <img src="{{ asset('templateLandings/assets/images/demos/demo-13/cats/cat-page/05.jpg') }}"
                                            alt="Category image">
                                    </span>
                                </figure>

                                <h3 class="cat-block-title">Lapangan Taraflex</h3><!-- End .cat-block-title -->
                            </a>
                        </div><!-- End .col-6 col-md-4 col-lg-3 -->

                        <div class="col-6 col-md-4 col-lg-3">
                            <a href="{{route('landing.sortType', 6)}}" class="cat-block">
                                <figure>
                                    <span>
                                        <img src="{{ asset('templateLandings/assets/images/demos/demo-13/cats/cat-page/06.jpg') }}"
                                            alt="Category image">
                                    </span>
                                </figure>

                                <h3 class="cat-block-title">Lapangan Karpet Plastik</h3><!-- End .cat-block-title -->
                            </a>
                        </div><!-- End .col-6 col-md-4 col-lg-3 -->


                    </div><!-- End .row -->
                </div><!-- End .cat-blocks-container -->


                <div class="toolbox">
                    <div class="toolbox-left">
                        <div class="toolbox-info">
                            Menampilkan <span>{{$venues->count()}}</span> Venue
                        </div><!-- End .toolbox-info -->
                    </div><!-- End .toolbox-left -->

                    <div class="toolbox-right">
                    </div><!-- End .toolbox-right -->
                </div><!-- End .toolbox -->

                <div class="products mb-3">
                <div class="row">
                        @foreach ($venues as $venue)
                        <div class="col-6 col-md-4 col-xl-3">
                            <div class="product">
                                <figure class="product-media">
                                    <a href="{{ route('commerce.show', $venue->id) }}">
                                        <img src="{{ asset('images/venue/'.$venue->FirstImage()->image) }}"
                                            alt="Product image" class="product-image" style="height: 120px;">
                                    </a>
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a
                                            href="{{ route('commerce.show', $venue->id) }}">
                                            {{$venue->name}}</a></h3>
                                    <!-- End .product-title -->
                                    <div class="product-price">
                                    </div><!-- End .product-price -->
                                    <div>
                                        <span>{{$venue->address}}</span>
                                    </div><!-- End .rating-container -->
                                    <div class="product-price">
                                        <small style="font-size:10px;">Mulai dari</small>
                                           <b>&nbsp;{{Helper::rupiah($venue->rangePrice('asc')->price)}} </b>
                                    </div><!-- End .product-price -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        </div><!-- End .col-sm-6 col-md-4 col-xl-3 -->
                        @endforeach
                    </div><!-- End .row -->
                </div><!-- End .products -->

                <!-- <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="page-item disabled">
                            <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1"
                                aria-disabled="true">
                                <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                            </a>
                        </li>
                        <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item-total">of 2</li>
                        <li class="page-item">
                            <a class="page-link page-link-next" href="#" aria-label="Next">
                                Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                            </a>
                        </li>
                    </ul>
                </nav> -->
            </div><!-- End .col-lg-9 -->

        </div><!-- End .row -->
    </div><!-- End .container -->
</div>
sa
@endsection