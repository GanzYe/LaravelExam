<?php
$cartItems = $cartItems ?? null;
?>
@extends('layouts.app')

@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Корзина</td>
                        <td class="title">Название</td>
                        <td class="description">Описание</td>
                        <td class="price">Price</td>
                        <td class="price">Actions</td>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cartItems as $item)
                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="{{$item->image_path}}" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{$item->name}}</a></h4>
                            </td>
                            <td class="cart_price">
                                <p>{{$item->description}}</p>
                            </td>
                            <td class="cart_price">
                                <p>{{$item->price}}</p>
                            </td>
                            <td>
                                <form action="{{route('cart.delete',$item->id)}}" method="post">
                                    @csrf @method('delete')
                                    <button class="border-2 border-red-200 rounded-md p-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-10 w-10 text-red-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @if(count($cartItems)>0)
                <form action="{{route('cart.Alldelete',$item->id)}}" method="post">
                    @csrf @method('delete')
                    <button class="border-2 border-red-200 rounded-md p-1">
                       Купить
                    </button>
                </form>
            @endif
        </div>
    </section>
@endsection
