@extends('frontend.layouts.master')
@section('content')
	<!--main area-->
	<main id="main" class="main-site">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="#" class="link">home</a></li>
					<li class="item-link"><span>login</span></li>
				</ul>
			</div>
			<div class=" main-content-area">

				<div class="wrap-iten-in-cart" id="wishlist_list">
					@include('frontend.layouts.wishlist')
					
				</div>

				<div class="summary">
					<div class="checkout-info">
						<a class="btn btn-checkout" href="checkout.html">Add to Cart All</a>
						<a class="link-to-shop" href="shop.html">Continue Shopping<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
					</div>
					<div class="update-clear">
						<a class="btn btn-clear" href="#">Clear WishList</a>
						<a class="btn btn-update" href="#">Update Wishlist</a>
					</div>
				</div>

				<div class="wrap-show-advance-info-box style-1 box-in-site">
					<h3 class="title-box">Latest Products</h3>
					<div class="wrap-products">
						<div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >
							@foreach ($latestProduct as $item)
							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									@php
										$photo=explode(',',$item->photo)
									@endphp
									<a href="#" title="{{$item->title}}">
										<figure><img src="{{$photo[0]}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div>
										<a class="i add-to-wishlist" id="add_to_wishlist{{$item->id}}" data-quntity="1" data-product-id="{{$item->id}}" href="javascript:void(0)"><i class="fas fa-heart"></i></a>
									</div>
									<div class="group-flash">
										<span class="flash-item new-label">{{$item->conditions}}</span>
									</div>
									<div class="wrap-btn">
										<a href="" data-quntity="1" data-product-id="{{ $item->id }}" class="function-link add_to_cart" id="add_to_cart{{ $item->id }}">Add To Cart</a>
										{{-- <a href="#" class="function-link">quick view</a> --}}
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>{{$item->title}}</span></a>
									<div class="wrap-price"><span class="product-price">{{$item->price}}</span></div>
								</div>
							</div>
							@endforeach
							
						</div>
					</div><!--End wrap-products-->
				</div>

			</div>
            <!--end main content area-->
		</div><!--end container-->

	</main>
	<!--main area-->
	
@endsection
@section('scripts')
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

{{-- move to cart for list --}}
<script>
    $(document).on('click', '.function-link', function(e) {
       e.preventDefault();
        var rowId = $(this).data('id');

        var token = "{{ csrf_token() }}";
        var path = "{{route('wishlist.move.cart')}}";

        $.ajax({
            url: path,
            type: "POST",
            dataType: "JSON",
            data: {
                rowId:rowId,
                _token: token,
            },
            beforeSend: function() {
                $(this).html('<i class="fa fa-spinner fa-spin"></i> Loading...');
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
               else
               {
                swal({
                   title: "Ooops!",
                   text: data['message'],
                   icon: "warning",
                   button: "OK!",
                   });
               } 
           }
        });
    });

</script>

{{-- delete from wishlist --}}
<script>
    $(document).on('click', '.wishlist_delete', function(e) {
       e.preventDefault();
        var rowId = $(this).data('id');

        var token = "{{ csrf_token() }}";
        var path = "{{route('wishlist.delete')}}";

        $.ajax({
            url: path,
            type: "POST",
            dataType: "JSON",
            data: {
                rowId:rowId,
                _token: token,
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
               else
               {
                swal({
                   title: "Ooops!",
                   text: "Something Went wrong",
                   icon: "warning",
                   button: "OK!",
                   });
               } 
           }
        });
    });

</script>


@endsection