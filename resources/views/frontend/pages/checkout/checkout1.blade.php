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
				<div class="wrap-address-billing">
					<h3 class="box-title">Billing Address</h3>
					<form action="{{route('checkout1.store')}}" method="post" name="frm-billing">
                        @csrf
                        @php
                            $name=explode(' ',auth()->user()->full_name);
                        @endphp
						<p class="row-in-form">
							<label for="fname">first name<span>*</span></label>
							<input id="first_name" type="text" name="first_name" value="{{$name[0]}}" placeholder="Your name">
						</p>
						<p class="row-in-form">
							<label for="lname">last name<span>*</span></label>
							<input id="last_name" type="text" name="last_name" value="{{$name[1]}}" placeholder="Your last name">
						</p>
						<p class="row-in-form">
							<label for="email">Email Addreess:</label>
							<input id="email" type="email" name="email" value="{{auth()->user()->email}}" placeholder="Type your email" readonly>
						</p>
						<p class="row-in-form">
							<label for="phone">Phone number<span>*</span></label>
							<input id="phone" type="number" name="phone" value="{{auth()->user()->phone}}" placeholder="10 digits format">
						</p>
						<p class="row-in-form">
							<label for="add">Address:</label>
							<input id="address" type="text" name="address" value="{{auth()->user()->address}}" placeholder="Street at apartment number">
						</p>
						<p class="row-in-form">
							<label for="country">Country<span>*</span></label>
							<input id="country" type="text" name="country" value="{{auth()->user()->country}}" placeholder="United States">
						</p>
						{{-- <p class="row-in-form">
							<label for="zip-code">Postcode / ZIP:</label>
							<input id="zip-code" type="number" name="zip-code" value="" placeholder="Your postal code">
						</p> --}}
						{{-- <p class="row-in-form">
							<label for="city">Town / City<span>*</span></label>
							<input id="city" type="text" name="city" value="" placeholder="City name">
						</p> --}}
						<p class="row-in-form fill-wife">
							{{-- <label class="checkbox-field">
								<input name="create-account" id="create-account" value="forever" type="checkbox">
								<span>Create an account?</span>
							</label> --}}
							<label class="checkbox-field">
								<input name="different-add" id="same_add" value="forever" type="checkbox">
								<span>Ship to same address?</span>
							</label>
						</p>

                        <p class="row-in-form">
							<label for="fname">first name<span>*</span></label>
							<input id="sfirst_name" type="text" name="sfirst_name" value="{{$name[0]}}" placeholder="Your name">
						</p>
						<p class="row-in-form">
							<label for="lname">last name<span>*</span></label>
							<input id="slast_name" type="text" name="slast_name" value="{{$name[1]}}" placeholder="Your last name">
						</p>
						<p class="row-in-form">
							<label for="email">Email Addreess:</label>
							<input id="semail" type="email" name="semail" value="{{auth()->user()->email}}" placeholder="Type your email" readonly>
						</p>
						<p class="row-in-form">
							<label for="phone">Phone number<span>*</span></label>
							<input id="sphone" type="number" name="sphone" value="{{auth()->user()->phone}}" placeholder="10 digits format">
						</p>
						<p class="row-in-form">
							<label for="add">Address:</label>
							<input id="saddress" type="text" name="saddress" value="{{auth()->user()->address}}" placeholder="Street at apartment number">
						</p>
						<p class="row-in-form">
							<label for="country">Country<span>*</span></label>
							<input id="scountry" type="text" name="scountry" value="{{auth()->user()->country}}" placeholder="United States">
						</p>
                        <div>
                            <a class="btn btn-primary" href="{{route('cart.list')}}">
                                Back
                            </a>
                        
                            <button Type="submit" class="btn btn-primary">Continue</button>
                        

                        </div>
					</form>
                    
				</div>

				<!-- <div class="summary summary-checkout">
					<div class="summary-item payment-method">
						<h4 class="title-box">Payment Method</h4>
						<p class="summary-info"><span class="title">Check / Money order</span></p>
						<p class="summary-info"><span class="title">Credit Cart (saved)</span></p>
						<div class="choose-payment-methods">
							<label class="payment-method">
								<input name="payment-method" id="payment-method-bank" value="bank" type="radio">
								<span>Direct Bank Transder</span>
								<span class="payment-desc">But the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</span>
							</label>
							<label class="payment-method">
								<input name="payment-method" id="payment-method-visa" value="visa" type="radio">
								<span>visa</span>
								<span class="payment-desc">There are many variations of passages of Lorem Ipsum available</span>
							</label>
							<label class="payment-method">
								<input name="payment-method" id="payment-method-paypal" value="paypal" type="radio">
								<span>Paypal</span>
								<span class="payment-desc">You can pay with your credit</span>
								<span class="payment-desc">card if you don't have a paypal account</span>
							</label>
						</div>
						<p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price">$100.00</span></p>
						<a href="thankyou.html" class="btn btn-medium">Place order now</a>
					</div>
					<div class="summary-item shipping-method">
						<h4 class="title-box f-title">Shipping method</h4>
						<table>
                            <thead>
                                <tr>
                                    <th>
                                        <span class="title">Method</span>
                    
                                    </th>
                                    <th>
                                        <span class="title">Delivery Time</span>
                    
                                    </th>
                                    <th>
                                        <span class="title">Price</span>
                    
                                    </th>
                                    <th>
                                        <span class="title">Choose</span>
                    
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <p class="summary-info"><span class="title">Courier</span></p>
            

                                    </td>
                                    <td>
                                        <p class="summary-info"><span class="title">2 days</span></p>
            

                                    </td>
                                    <td>
                                        <p class="summary-info"><span class="title">100</span></p>
            

                                    </td>
                                    <td>
                                        <p class="summary-info"><input type="checkbox"></p>
            

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="summary-info"><span class="title">Flat Rate</span></p>
            

                                    </td>
                                    <td>
                                        <p class="summary-info"><span class="title">1 day</span></p>
            

                                    </td>
                                    <td>
                                        <p class="summary-info"><span class="title">200</span></p>
            

                                    </td>
                                    <td>
                                        <p class="summary-info"><input type="checkbox"></p>
                                        
            

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="summary-info"><span class="title">Free Shipping</span></p>
            

                                    </td>
                                    <td>
                                        <p class="summary-info"><span class="title">1 day</span></p>
            

                                    </td>
                                    <td>
                                        <p class="summary-info"><span class="title">Flat Rate</span></p>
            

                                    </td>
                                    <td>
                                        <p class="summary-info"><input type="checkbox"></p>

            

                                    </td>
                                </tr>
                            </tbody>
                            
                        </table>
						<h4 class="title-box">Discount Codes</h4>
						<p class="row-in-form">
							<label for="coupon-code">Enter Your Coupon code:</label>
							<input id="coupon-code" type="text" name="coupon-code" value="" placeholder="">	
						</p>
						<a href="#" class="btn btn-small">Apply</a>
					</div>
				</div> -->

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

			</div><!--end main content area-->
		</div><!--end container-->

	</main>
	<!--main area-->
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

{{-- ship to same address  --}}
<script>
$('#same_add').on('change',function(e)
{
    e.preventDefault();
    if (this.checked) {
        $('#sfirst_name').val($('#first_name').val());
        $('#slast_name').val($('#last_name').val());
        $('#saddress').val($('#address').val());
        $('#semail').val($('#email').val());
        $('#scountry').val($('#country').val());
        $('#sphone').val($('#phone').val());
        
    }
    else
    {
        $('#sfirst_name').val("");
        $('#slast_name').val("");
        $('#saddress').val("");
        $('#semail').val("");
        $('#scountry').val("");
        $('#sphone').val("");
        
    }
})
</script>


@endsection