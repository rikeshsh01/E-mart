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
                <form action="{{route('checkout3.store')}}" method="post" >
                        @csrf
					<div class="summary-item payment-method">
						<h4 class="title-box">Payment Method</h4>
						<p class="summary-info"><span class="title">Check / Money order</span></p>
						<p class="summary-info"><span class="title">Credit Cart (saved)</span></p>
						<div class="choose-payment-methods">
							<label class="payment-method">
								<input name="payment_method" id="payment-method-bank" value="bank" type="radio">
								<span>Direct Bank Transder</span>
								<span class="payment-desc">But the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</span>
							</label>
							<label class="payment-method">
								<input name="payment_method" id="payment-method-visa" value="visa" type="radio">
								<span>visa</span>
								<span class="payment-desc">There are many variations of passages of Lorem Ipsum available</span>
							</label>
							<label class="payment-method">
								<input name="payment_method" id="payment-method-paypal" value="paypal" type="radio">
								<span>Paypal</span>
								<span class="payment-desc">You can pay with your credit</span>
								<span class="payment-desc">card if you don't have a paypal account</span>
							</label>
                            <label class="payment-method">
								<input name="payment_method" id="payment-method-paypal" value="cod" type="radio">
								<span>Cash On Delivery</span>
								<span class="payment-desc">You can pay after you got product in hand</span>
							</label>
						</div>
                        <p id="aa">
                        </p>
						<p class="summary-info grand-total"><span>Grand Total</span> <span  class="grand-total-price"></span></p>
						<button type="submit" class="btn btn-medium">Place order now</button>
					</div>
                </form>

				</div>



			</div><!--end main content area-->
		</div><!--end container-->

	</main>
	<!--main area-->
@endsection