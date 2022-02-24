<table>
    <h3 class="box-title">Products Name</h3>
    <ul class="products-cart">

        @foreach (Cart::instance('wishlist')->content() as $item)
        <li class="pr-cart-item">
            <div class="price-field produtc-price"><p class="price">{{$loop->iteration}}</p></div>

            <div class="product-image">
                <figure><img src="{{$item->model->photo}}" alt=""></figure>
            </div>
            <div class="product-name">
                <a class="link-to-product" href="#">{{$item->name}}</a>
            </div>
            <div class="price-field produtc-price"><p class="price">Rs {{$item->price}}</p></div>
            
        
            <div class="quantity delete">
                <a href="javascript:void(0)" data-quntity="1" data-id="{{ $item->rowId }}" class="function-link">
                   <button class="btn btn-delete">Move To Cart</button>
                </a>

            </div>
            <div class="delete">
                <a href="{{route('wishlist.delete')}}" class="btn btn-delete" title="">
                    <span>Delete from your cart</span>
                    <i class="fa fa-trash wishlist_delete" data-id="{{$item->rowId}}"></i>
                </a>
            </div>
        </li>
        @endforeach											
    </ul>
</table>