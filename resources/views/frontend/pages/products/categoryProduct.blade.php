@extends('frontend.layouts.master')
@section('content')
    <!--main area-->
    <main id="main" class="main-site left-sidebar">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="#" class="link">home</a></li>
                    <li class="item-link"><span>Digital & Electronics</span></li>
                </ul>
            </div>
            <div class="row">

                <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

                    <div class="banner-shop">
                        <a href="#" class="banner-link">
                            <figure><img src="assets/images/shop-banner.jpg" alt=""></figure>
                        </a>
                    </div>

                    <div class="wrap-shop-control">

                        <h1 class="shop-title">{{ $parentName->title }}</h1>

                        <div class="wrap-right">

                            <div class="sort-item orderby ">
                                <select name="orderby" class="use-chosen" id="sortBy">
                                    <option value="menu_order">Default sorting</option>
                                    {{-- <option value="popularity">Sort by popularity</option> --}}
                                    <option value="discountDesc">Sort by discount: HIgh to Low</option>
                                    <option value="discountAsc">Sort by discount:Low to HIgh</option>
                                    <option value="priceAsc">Sort by price: low to high</option>
                                    <option value="priceDesc">Sort by price: high to low</option>
                                    <option value="titleAsc">Alphabetical Asc Order</option>
                                    <option value="titleDesc">Alphabetical Desc Order</option>
                                </select>
                            </div>

                            {{-- <div class="change-display-mode">
                            <a href="#" class="grid-mode display-mode active"><i class="fa fa-th"></i>Grid</a>
                            <a href="list.html" class="list-mode display-mode"><i class="fa fa-th-list"></i>List</a>
                        </div> --}}

                        </div>

                    </div>
                    <!--end wrap shop control-->

                    <div class="row" id="product_data">


                        @include('frontend.layouts.single_product')

                    </div>

                    <div class="ajax_load text-center" style="display: none">
                        <img src="{{ asset('frontend/200.gif') }}" alt="">

                    </div>

                </div>
                <!--end main products area-->

                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                    <div class="widget mercado-widget categories-widget">
                        <h2 class="widget-title">All Categories</h2>
                        <div class="widget-content">

                            @foreach ($parentCategories as $item)

                                <ul class="list-category">
                                    <li class="category-item has-child-cate">
                                        <a href="{{ route('product-category', $item->id) }}" class="cate-link">{{ $item->title }}</a>


                                        @if ($item->child->count() > 0)
                                            <span class="toggle-control">+</span>

                                            <ul class="sub-cate">

                                                @foreach ($item->child as $child)

                                                    <li class="category-item"><a
                                                            href="{{ route('product-category', $child->id) }}"
                                                            class="cate-link">{{ $child->title }}</a></li>

                                                @endforeach

                                            </ul>
                                        @endif
                                    </li>

                                </ul>
                            @endforeach

                        </div>
                    </div>
                    <!-- Categories widget-->

                    {{-- <div class="widget mercado-widget filter-widget brand-widget">
                    <h2 class="widget-title">Brand</h2>
                    <div class="widget-content">
                        <ul class="list-style vertical-list list-limited" data-show="2">
                            @foreach ($brand as $item)
                                <li class="list-item"><a class="filter-link" href="{{route('product-category',$item->id)}}">{{$item->title}}</a></li>
                               
                            @endforeach
                            @if ($item->count() > 5)
                            <li class="list-item">
                                <a data-label='Show less<i class="fa fa-angle-up" aria-hidden="true"></i>' class="btn-control control-show-more" href="#">Show more<i class="fa fa-angle-down" aria-hidden="true"></i>
                                </a>
                            </li>
                            @endif
                        
                            
                        </ul>
                    </div>
                </div><!-- brand widget--> --}}

                    <div class="widget mercado-widget filter-widget price-filter">
                        <h2 class="widget-title">Price</h2>
                        <div class="widget-content">
                            <div id="slider-range"></div>
                            <p>
                                <label for="amount">Price:</label>
                                <input type="text" id="amount" readonly>
                                <button class="filter-submit">Filter</button>
                            </p>
                        </div>
                    </div><!-- Price-->


                    {{-- <div class="widget mercado-widget filter-widget">
                    <h2 class="widget-title">Size</h2>
                    <div class="widget-content">
                        <ul class="list-style inline-round ">
                            <li class="list-item"><a class="filter-link active" href="#">s</a></li>
                            <li class="list-item"><a class="filter-link " href="#">M</a></li>
                            <li class="list-item"><a class="filter-link " href="#">l</a></li>
                            <li class="list-item"><a class="filter-link " href="#">xl</a></li>
                        </ul>
                        <div class="widget-banner">
                            <figure><img src="{{asset('frontend/assets/images/size-banner-widget.jpg')}}" width="270" height="331" alt=""></figure>
                        </div>
                    </div>
                </div> --}}
                    <!-- Size -->

                    <div class="widget mercado-widget widget-product">
                        <h2 class="widget-title">Popular Products</h2>
                        <div class="widget-content">
                            <ul class="products">
                                <li class="product-item">
                                    <div class="product product-widget-style">
                                        <div class="thumbnnail">
                                            <a href="detail.html"
                                                title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                                <figure><img
                                                        src="{{ asset('frontend/assets/images/products/digital_01.jpg') }}"
                                                        alt=""></figure>
                                            </a>

                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional
                                                    Speaker...</span></a>
                                            <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                        </div>
                                    </div>
                                </li>

                                <li class="product-item">
                                    <div class="product product-widget-style">
                                        <div class="thumbnnail">
                                            <a href="detail.html"
                                                title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                                <figure><img
                                                        src="{{ asset('frontend/assets/images/products/digital_17.jpg') }}"
                                                        alt=""></figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional
                                                    Speaker...</span></a>
                                            <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                        </div>
                                    </div>
                                </li>

                                <li class="product-item">
                                    <div class="product product-widget-style">
                                        <div class="thumbnnail">
                                            <a href="detail.html"
                                                title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                                <figure><img
                                                        src="{{ asset('frontend/assets/images/products/digital_18.jpg') }}"
                                                        alt=""></figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional
                                                    Speaker...</span></a>
                                            <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div><!-- brand widget-->

                </div>
                <!--end sitebar-->

            </div>
            <!--end row-->

        </div>
        <!--end container-->

    </main>
    <!--main area-->

@endsection

@section('scripts')
    <script>
        $('#sortBy').change(function() {
            var sort = $('#sortBy').val();
            // alert(sort);
            window.location = "{{ url('' . $route . '') }}/{{ $catproduct->id }}?sort=" + sort;
        });

    </script>
    <script>
        var page = 1;
        $(window).scroll(function() {
            if ($(window).scrollTop() + $(window).height() + 800 >= $(document).height()) {
                page++;
                loaderData(page);
            }
        });

        function loaderData(page) {
            $.ajax({
                    url: '?page=' + page,
                    type: 'get',
                    beforeSend: function() {
                        $('.ajax_load').show();

                    },

                })
                .done(function(data) {
                    if ((data.html) == '') {
                        $('ajax_load').html('No More data');
                        return;
                    }
                    $('.ajax_load').hide();
                    $('#product_data').append(data.html);
                })
                .fail(function() {
                    alert('Something Went Wrong Try Again!');

                });

        }

    </script>
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



@endsection
