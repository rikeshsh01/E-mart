<div class="wrap-iten-in-cart summary">
    <h3 class="box-title">Products Name</h3>
    <ul class="products-cart">
        @foreach (Cart::instance('shopping')->content() as $item)

        <li class="pr-cart-item">
            <div class="product-image">
                <figure><img src="{{$item->model->photo}}" alt=""></figure>
            </div>
            <div class="product-name">
                <a class="link-to-product" href="#">{{$item->name}}</a>
            </div>
            <div class="price-field produtc-price"><p class="price">{{$item->price}}</p></div>
            <div class="quantity">
                <div class="quantity-input">
                    <input type="number" class="qty-text" id="qty-input-{{$item->rowId}}" data-id="{{$item->rowId}}" name="product-quatity" value="{{$item->qty}}" >
                    <input type="hidden" data-id="{{$item->rowId}}" data-product-qty="{{$item->model->stock}}" id="update-cart-{{$item->rowId}}">						
                    <a class="btn btn-increase" id="qtyUpdate"  href="javascript:void(0)"></a>
                    <a class="btn btn-decrease" id="qtyUpdate" href="javascript:void(0)"></a>
                </div>
            </div>
            <div class="price-field sub-total"><p class="price">{{$item->subtotal}}</p></div>
            <div class="delete">
                <a href="{{route('cart.delete')}}" class="btn btn-delete" title="">
                    <span>Delete from your cart</span>
                    <i class="fa fa-trash cart_delete" data-id="{{$item->rowId}}"></i>
                </a>
            </div>
            
        </li>	
        
        @endforeach	
        		
    </ul>
    <div class="order-summary">
        <h4 class="title-box">Order Summary</h4>
        <p class="summary-info"><span class="title"><b>Subtotal</b></span><b class="index">{{Cart::subtotal()}}</b></p>
        <p class="summary-info"><span class="title"><b>Shipping</b></span><b class="index">Free Shipping</b></p>
    </div>	
            <hr>
    <div class="checkout-info">
        <label class="checkbox-field">
            <span>I have promo code</span><br>
            <form action="{{route('coupon.add')}}" method="POST" id="coupon-form">
                @csrf
                <input class="frm-input " name="code" id="have-code" value="" type="text" placeholder="Enter Code..."><br><br>
                <span><button type="submit" class="btn btn-success coupon-apply">Apply Coupon</button></span>
            </form>
        </label>
        <div class="order-summary">
            @if (session()->has('coupon'))
            <p class="summary-info total-info "><span class="title"><b>Total Price</b></span><b class="index">{{Cart::subtotal()- session('coupon')['value']}}</b></p>
                                
            @else
            <p class="summary-info total-info "><span class="title"><b>Total Price</b></span><b class="index">{{Cart::subtotal()}}</b></p>
                
            @endif

        </div>

        <a class="btn btn-checkout" id="click_here" href="{{route('cart.checkout1')}}">Check out</a>
        <a class="link-to-shop" href="shop.html">Continue Shopping<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
    </div>
    <div class="update-clear">
        <a class="btn btn-clear" href="#">Clear Shopping Cart</a>
        <a class="btn btn-update" href="#">Update Shopping Cart</a>
    </div>
</div>


<script>
    document.getElementById("click_here").addEventListener("click", click_here);
    function click_here(){
        var price= document.querySelector('#cart_list > div > div.wrap-iten-in-cart.summary > div.checkout-info > div > p > b').innerHTML;
        var token = "{{ csrf_token() }}";
        var path ="{{route('checkout3.store')}}";
        $.ajax({
            url: path,
            type: "GET",
            data: {
                    price: price

                },
            success: function(response){ // What to do if we succeed
                    alert(response); 
            },
            error: function(response){
                alert('Error'+response);
            }
        });

    }
        

   
</script>