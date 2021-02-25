<?php
$products = $products ?? null;
?>
@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Товары</h2>
                        @foreach($products as $item)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{$item->image_path}}" alt="" />
                                            <h2>${{$item->price}}</h2>
                                            <p>{{$item->name}}</p>
                                            @guest
                                                <a href="{{route('login')}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Добавить в корзину</a>
                                            @else
                                                <a href="{{route('cart.add',$item)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Добавить в корзину</a>
                                            @endguest
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>${{$item->price}}</h2>
                                                <p>{{$item->name}}
                                                    @guest
                                                        <a href="{{route('login')}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Добавить в корзину</a>
                                                    @else
                                                        <a href="{{route('cart.add',$item)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Добавить в корзину</a>
                                                @endguest
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div><!--features_items-->
                </div>
            </div>
        </div>
    </section>

@endsection
