@extends('layouts.app')

@section('content')

    <div class="col-sm-3">
        <div class="left-sidebar">
            <h2>Каталог</h2>
            <div class="panel-group category-products">
                @foreach ($categories  as $categoryItem)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="/category/{{$categoryItem['id']}} "
                               class="
                                @if ($category->id == $categoryItem['id']) {{'active'}} @endif">

                                {{$categoryItem['name']}}
                            </a>
                        </h4>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>

    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Последние товары</h2>
            @foreach ($products as $product)
            <div class="col-sm-4">
                @include('layouts.product')
            </div>
            @endforeach

        </div><!--features_items-->
         {{$products->links()}}

        <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">Рекомендуемые товары</h2>
            <div class="cycle-slideshow"
                 data-cycle-fx=carousel
                 data-cycle-timeout=5000
                 data-cycle-carousel-visible=3
                 data-cycle-carousel-fluid=true
                 data-cycle-slides="div.item"
                 data-cycle-prev="#prevControl"
                 data-cycle-next="#nextControl"
            >

                <div class="row justify-content-center">
                    @foreach ($products as $product)
                    <div class="item">
                        <div class="col-12">
                            @include('layouts.product')
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="row justify-content-center">
                <a class="left recommended-item-control" id="prevControl" href="#recommended-item-carousel" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="right recommended-item-control" id="nextControl" href="#recommended-item-carousel" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>
        </div>
@endsection
    <!--/recommended_items-->

