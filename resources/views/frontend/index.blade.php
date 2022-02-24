@extends('frontend.layouts.master')
@section('content')

    <main id="main">
        <div class="container">

            <!--MAIN SLIDE-->
            {{-- @if (count($banner) > 0) --}}

            <div class="wrap-main-slide">

                <div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true"
                    data-dots="false">
                    @foreach ($slide as $item)
                        <div class="item-slide">
                            <img src="{{ $item->photo }}" alt="" class="img-slide">
                            <div class="slide-info slide-1">
                                <h2 class="f-title"><b>{{ $item->title }}</b></h2>
                                <span class="subtitle">{!! html_entity_decode($item->description) !!}</span><br>
                                {{-- <p class="sale-info">Only price: <span class="price">$59.99</span></p> --}}
                                <a href="#" class="btn-link">Shop Now</a>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

            {{-- @endif --}}


            <!--BANNER-->
            <div class="wrap-banner style-twin-default">
                @foreach ($banner as $item)
                    <div class="banner-item">
                        <a href="#" class="link-banner banner-effect-1">
                            <figure>
                                <img src="{{ $item->photo }}" alt="" width="580" height="190">
                            </figure>
                        </a>
                    </div>
                @endforeach
            </div>

            <!--On Sale-->
            <div class="wrap-show-advance-info-box style-1 has-countdown">
                <h3 class="title-box">On Sale</h3>

                <div class="wrap-countdown mercado-countdown" data-expire="2022/12/12 12:34:56"></div>

                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5"
                    data-loop="false" data-nav="true" data-dots="false"
                    data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

                    @foreach ($product as $item)
                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="{{ route('product-detail', $item->id) }}" title="{{ $item->title }}">
                                    @php
                                        $photos = explode(',', $item->photo);
                                    @endphp
                                    <figure><img src="{{ $photos[0] }}" width="800" height="800"
                                            alt="{{ $item->title }}"></figure>
                                </a>

                                <div>
                                    <a class="i add-to-wishlist" id="add_to_wishlist{{$item->id}}" data-quntity="1" data-product-id="{{$item->id}}" href="javascript:void(0)"><i class="fas fa-heart"></i></a>
                                </div>
                               
                                <div class="group-flash">
                                    <span class="flash-item sale-label">sale</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="" data-quntity="1" data-product-id="{{ $item->id }}"
                                        class="function-link add_to_cart" id="add_to_cart{{ $item->id }}">Add To Cart</a>
                                    {{-- <a href="{{ route('product-detail', $item->id) }}" class="function-link">quick view</a> --}}
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>{{ $item->title }}</span></a>
                                <div class="wrap-price"><span class="product-price">{{ $item->price }}</span></div>
                            </div>
                        </div>

                    @endforeach
                </div>

            </div>

            <!--Latest Products-->
            <div class="wrap-show-advance-info-box style-1">
                <h3 class="title-box">Latest Products</h3>
                <div class="wrap-top-banner">
                    <a href="#" class="link-banner banner-effect-2">
                        <figure><img src="{{ asset('frontend/assets/images/banner/digital-electronic-banner.jpg') }}"
                                width="1170" height="240" alt=""></figure>
                    </a>
                </div>
                <div class="wrap-products">
                    <div class="wrap-product-tab tab-style-1">
                        <div class="tab-contents">
                            <div class="tab-content-item active" id="digital_1a">
                                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                    data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                    data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

                                    @foreach ($latestProduct as $item)
                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="{{ route('product-detail', $item->id) }}"
                                                    title="{{ $item->title }}">
                                                    @php
                                                        $photos = explode(',', $item->photo);
                                                    @endphp
                                                    <figure>
                                                        <img src="{{ $photos[0] }}" width="800" height="800"
                                                            alt="{{ $item->title }}">
                                                    </figure>
                                                </a>
                                                <div>
                                                    <a class="i add-to-wishlist" id="add_to_wishlist{{$item->id}}" data-quntity="1" data-product-id="{{$item->id}}" href="javascript:void(0)"><i class="fas fa-heart"></i></a>
                                                </div>
                                                <div class="group-flash">
                                                    <span class="flash-item new-label">{{ $item->conditions }}</span>
                                                </div>
                                                <div class="wrap-btn">
                                                    <a href="" data-quntity="1" data-product-id="{{ $item->id }}" class="function-link add_to_cart" id="add_to_cart{{ $item->id }}">Add To Cart</a>
                                                    {{-- <a href="{{ route('product-detail', $item->id) }}" class="function-link">quick view</a> --}}

                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="#" class="product-name"><span>{{ $item->title }}</span></a>
                                                <div class="wrap-price"><span
                                                        class="product-price">{{ $item->price }}</span></div>
                                            </div>
                                        </div>
                                    @endforeach


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Product Categories-->
            <div class="wrap-show-advance-info-box style-1">
                <h3 class="title-box">Product Categories</h3>
                <div class="wrap-top-banner">
                    <a href="#" class="link-banner banner-effect-2">
                        <figure><img src="{{ asset('frontend/assets/images/banner/fashion-accesories-banner.jpg') }}"
                                width="1170" height="240" alt=""></figure>
                    </a>
                </div>
                <div class="wrap-products">
                    <div class="wrap-product-tab tab-style-1">
                        {{-- <div class="tab-control">
                        @foreach ($categoryTitle as $item)
                        <a href="#fashion_1b" class="tab-control-item">{{$item->title}}</a>
                            
                        @endforeach
                    
                    </div> --}}

                        <div class="tab-contents">
                            <div class="tab-content-item active" id="fashion_1a">
                                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                    data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                    data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

                                    @foreach ($categories as $item)
                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="{{ route('product-category', $item->id) }}"
                                                    title="{{ $item->title }}">
                                                    <figure>
                                                        <img src="{{ $item->photo }}" width="800" height="800"
                                                            alt="{{ $item->title }}">
                                                    </figure>
                                                </a>
                                                <div class="group-flash">
                                                    <span class="flash-item new-label">{{ $item->status }}</span>
                                                </div>
                                                <div class="wrap-btn">
                                                    <a href="{{ route('product-category', $item->id) }}"
                                                        class="function-link">quick view</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="#" class="product-name"><span>{{ $item->title }}</span></a>
                                                {{-- <div class="wrap-price"><span class="product-price">Rs: {{$item->price}}</span></div> --}}
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            {{-- @endforeach --}}

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </main>


@endsection

@section('scripts')
    

{{-- add to cart --}}
<script>
    $(document).on('click', '.add_to_cart', function(e) {
       e.preventDefault();
        var product_id = $(this).data('product-id');
        var product_quntity = $(this).data('quntity');

        var token = "{{ csrf_token() }}";
        var path = "{{route('cart.store')}}";

        $.ajax({
            url: path,
            type: "POST",
            dataType: "JSON",
            data: {
                product_quntity: product_quntity,
                product_id: product_id,
                _token: token,
            },
            beforeSend: function() {
                $('#add_to_cart'+product_id).html('<i class="fa fa-spinner fa-spin"></i> Loading...');
            },
            complete:function(){
               $('#add_to_cart'+product_id).html('<i class="fa fa-cart-plus"></i> Add to Cart');

            },
           success: function(data){     
            $('body #header').html(data['header']);         
               if (data['status']) {
                   swal({
                   title: "Good job!",
                   text: data['message'],
                   icon: "success",
                   button: "OK!",
                   });
               }   
           }
        });
    });

</script>

{{-- add to wishlist --}}
<script>
    $(document).on('click', '.add-to-wishlist', function(e) {
       e.preventDefault();
        var product_id = $(this).data('product-id');
        var product_quntity = $(this).data('quntity');
        // alert(product_quntity);

        var token = "{{ csrf_token() }}";
        var path = "{{route('wishlist.store')}}";

        $.ajax({
            url: path,
            type: "POST",
            dataType: "JSON",
            data: {
                product_quntity: product_quntity,
                product_id: product_id,
                _token: token,
            },
            beforeSend: function() {
                $('#add_to_wishlist'+product_id).html('<i class="fa fa-spinner fa-spin"></i>');
            },
            complete:function(){
               $('#add_to_wishlist'+product_id).html('<i class="fa fa-heart"></i>');

            },
           success: function(data){    

            $('body #header').html(data['header']);  
            // $('body #header').html(data['header']);  

               if (data['status']) {
                   swal({
                   title: "Good job!",
                   text: data['message'],
                   icon: "success",
                   button: "OK!",
                   });
               } 

               else if(data['present'])
               {
                $('body #header').html(data['header']);  
                swal({
                   title: "Oops!",
                   text: data['message'],
                   icon: "warning",
                   button: "OK!",
                   });
               }  

               else{
                $('body #header').html(data['header']);  
                swal({
                   title: "Sorry!",
                   text: "You cant add product",
                   icon: "error",
                   button: "OK!",
                   });
               }
           }
           
          
        });
    });

</script>
@endsection

