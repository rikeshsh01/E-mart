<ul class="product-list grid-products equal-container">
@foreach ($products as $item)
                    
<li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
    <div class="product product-style-3 equal-elem ">
        <div class="product-thumnail">
            <a href="{{route('product-detail',$item->id)}}" title="{{$item->title}}">
                <figure><img src="{{$item->photo}}" alt="{{$item->title}}"></figure>
            </a>
            <a class="i" href="javascript:void(0)"><i class="fas fa-heart"></i></a>
            <div class="wrap-btn">

        </div>

        </div>
        <div class="product-info">
            <a href="{{route('product-detail',$item->id)}}" class="product-name"><span>{{$item->title}}</span></a>
            <div class="wrap-price"><span class="product-price">Rs.{{$item->price}}</span></div>
            <a href="#" data-quntity="1" data-product-id="{{ $item->id }}" class="btn add-to-cart add_to_cart" id="add_to_cart{{ $item->id }}">Add to Cart</a>
        </div>
        
    </div>
</li>
    
@endforeach
</ul>
