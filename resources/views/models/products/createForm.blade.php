<?php
$product = $product ?? null;
?>

@extends('layouts.app')

@section('content')
    <div class="p-10 mx-64">
        <h1 class="text-base  font-black text-gray-500">{{$product ? 'Редактировать товар':'Добавить товар'}}</h1>
        <div>
            <form  enctype="multipart/form-data" method="post" action="{{$product ? route('products.update',$product):route('products.store',$product)}}">
                <div class="flex">
                @csrf
                @if($product)
                    @method('put')
                @endif
                <div class="flex">
                    <div>
                        <div class="mt-5 flex">
                            <label class="text-sm flex-1 border border-2 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap " for="image">Изображение товара </label>
                            <input class="min-h-full text-sm flex-1 border border-2  px-4 py-2 bg-gray-300 " type="file" name="image" id="image" />
                        </div>
                        <div class="flex h-64 mt-5">
                            <span class="text-sm flex-2 border border-2 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap max-h-60 min-h-60 min-h-full">Описание:</span>
                            <textarea class="border border-2 rounded-r px-4 py-2 w-full max-h-60 min-h-full"  id="description" name="description">{{old('description',$product->description??null)}}</textarea>
                            @error('description')
                            <div>{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="ml-5">
                        <div class="flex my-5">
                            <span class="text-sm flex-1 border border-2 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">Название:</span>
                            <input class="border border-2 rounded-r px-4 py-2 w-full" value="{{old('name',$product->name??null)}}" type="text" id="name" name="name">
                            @error('name')
                            <div>{{$message}}</div>
                            @enderror
                        </div>
                        <div class="flex my-10">
                            <span class="text-sm flex-1 border border-2 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">Цена</span>
                            <input class="border border-2 rounded-r px-4 py-2 w-full" value="{{old('price',$product->price??null)}}" type="number" id="price" name="price">
                            @error('price')
                            <div>{{$message}}</div>
                            @enderror
                        </div>
                        <div class="flex my-10">
                            <span class="text-sm flex-1 border border-2 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">В наличии</span>
                            <input class="border border-2 rounded-r px-4 py-2 w-full" value="{{old('inStock',$product->inStock??null)}}" type="number" id="inStock" name="inStock">
                            @error('inStock')
                            <div>{{$message}}</div>
                            @enderror
                        </div>
                        <div class="flex my-10">
                            <span class="text-sm flex-1 border border-2 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">Id категории</span>
                            <input class="border border-2 rounded-r px-4 py-2 w-full" value="{{old('catalog_id',$product->catalog_id??null)}}" type="number" id="catalog_id" name="catalog_id">
                            @error('catalog_id')
                            <div>{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                </div>
                <button  class="ml-8  whitespace-nowrap inline-flex items-center justify-center px-3 py-2 border border-transparent rounded-md shadow-sm text-base font-black text-white bg-indigo-600 hover:bg-indigo-700">
                    {{$product?'Обновить':'Добавить'}}
                </button>
            </form>
        </div>
    </div>

@endsection
