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

				<div class="summary summary-checkout">
					<!-- <div class="summary-item payment-method">
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
					</div> -->
					<div class="summary-item shipping-method">
						<h4 class="title-box f-title">Shipping method</h4>
                        <form action="{{route('checkout2.store')}}" method="post" >
                        @csrf
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
                                @if(count($shipping)>0)
                                    @foreach($shipping as $key=>$item)
                                    <tr>
                                            <td>
                                                <p class="summary-info"><span class="title">{{$item->shipping_address}}</span></p>
                    

                                            </td>
                                            <td>
                                                <p class="summary-info"><span class="title">{{$item->delivery_time}}</span></p>
                    

                                            </td>
                                            <td>
                                                <p class="summary-info"><span class="title">{{number_format($item->delivery_charge)}}</span></p>
                    

                                            </td>
                                            <td>
                                                <p class="summary-info"><input id="checkbox{{$key}}" name="delivery_charge" value= "{{$item->delivery_charge}}" type="radio"></p>
                    

                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                <tr>
                                    <td>No shipping found</td>
                                </tr>
                                @endif

                            </tbody>
                            
                        </table>
                        <div>
                            <a class="btn btn-primary" href="{{route('cart.checkout1')}}">
                                Back
                            </a>
                        
                            <button Type="submit" class="btn btn-primary">Continue</button>
                        

                        </div>
                        </form>
					</div>
				</div>



			</div><!--end main content area-->
		</div><!--end container-->

	</main>
	<!--main area-->
@endsection

