
 <div class="product-image-wrapper">
        <div class="single-products">
            <div class="productinfo text-center">
                <img height="350px" width="auto" class="rounded mx-auto d-block" src="{{asset('storage')}}/{{($product['id'])}}.jpg" alt="" />
                <h2>{{$product['price']}}</h2>
                <p>
                    <a href="/product/{{$product['id']}}">
                       {{$product['name']}}
                    </a>
                </p>
                <a href="#" class="btn btn-default add-to-cart" data-id="{{$product['id']}}"><i class="fa fa-shopping-cart"></i>В корзину</a>
            </div>
     @if($product['is_new'])
        <img src="{{asset('images/new.png')}}" class="new" alt=""/>
    @endif
    </div>
</div>
