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
                                    <a href="/category/{{$categoryItem['id']}}">
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
                <div class="features_items">
                    <h2 class="title text-center">Корзина</h2>

                   @if($productsInCart)
                    <p>Вы выбрали такие товары:</p>
                    <table class="table-bordered table-striped table">
                        <tr>
                            <th>Код товара</th>
                            <th>Название</th>
                            <th>Стоимость,грн</th>
                            <th>Количество,шт</th>
                            <th>Удалить</th>
                        </tr>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$product['id']}}</td>
                            <td>
                                <a href="/product/{{$product['id']}}">
                                    {{$product['name']}}
                                </a>
                            </td>
                            <td>{{$product['price']}}</td>
                            <td>{{$productsInCart[$product['id']]}}</td>
                            <td><button class="btn"><i class="fa fa-trash-o"></i></button></td>

                        </tr>
                       @endforeach
                        <tr>
                            <td colspan="4">Общая стоимость:</td>
                            <td>{{$totalPrice}}</td>

                        </tr>
                    </table>
                    @else
                    <p>Корзина пуста</p>
             @endif
                <!--        <button  type="button" class="btn btn-danger lii" name="del" data-id="--><!--">Оформить заказ</button>-->
                    <li><a href="/order/" class="btn btn-danger lii"  >Оформить заказ</a> </li>

                </div>
            </div>
@endsection
