<?php
    use App\Models\Catalog;

    $products = $products ?? null;
?>

@extends('layouts.app')

@section('content')

    <div class="container flex flex-col max-w-full overflow-x-hidden shadow-md m-8">
        <!-- Tools -->
        <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6 bg-white p-6 space-y-2 md:space-y-0">
            <div class="relative sm:col-span-2 md:col-span-3 lg:col-span-2">
                <input
                    type="text"
                    placeholder="Search ....."
                    class="block w-full px-8 py-2 border border-gray-300 placeholder-gray-500 text-gray-800 shadow-sm rounded-md focus:outline-none focus:ring-gray-500 focus:border-gray-500 focus:z-10 sm:text-sm"
                />

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="absolute left-3 bottom-3 h-4 w-4 text-gray-500">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>

            <div class="">
                <select
                    name="representative"
                    class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-800 shadow-sm rounded-md focus:outline-none focus:ring-gray-500 focus:border-gray-500 focus:z-10 "
                >
                    <option value="">Representative</option>
                </select>
            </div>

            <div class="">
                <select
                    name="status"
                    class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-800 shadow-sm rounded-md focus:outline-none focus:ring-gray-500 focus:border-gray-500 focus:z-10 "
                >
                    <option value="">Status Report</option>
                </select>
            </div>

            <div class="">
                <select
                    name="schedule"
                    class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-800 shadow-sm rounded-md focus:outline-none focus:ring-gray-500 focus:border-gray-500 focus:z-10"
                >
                    <option value="">Schedule Date</option>
                </select>
            </div>
            <a href="{{route('products.create')}}" class="ml-8 whitespace-nowrap inline-flex items-center justify-center  border border-transparent rounded-md shadow-sm  text-white bg-indigo-600 hover:bg-indigo-700">
                Добавить товар
            </a>
        </div>
        <!-- End Tools -->

        <table class="overflow-x-auto w-full bg-white">
            <thead class="bg-blue-100 border-b border-gray-300">
            <tr>
                <th class="p-4 text-left  text-black-50">Дата создание</th>
                <th class="p-4 text-left  text-black-50">Название</th>
                <th class="p-4 text-left  text-black-50">Цена</th>
                <th class="p-4 text-left  text-black-50">В наличии</th>
                <th class="p-4 text-left  text-black-50">Описание</th>
                <th class="p-4 text-left  text-black-50">Категория</th>
                <th class="p-4 text-left  text-black-50">Actions</th>
            </tr>
            </thead>
            <tbody class="text-black-50 divide-y divide-gray-300">
                @foreach($products as $item)
                <tr class="bg-white  divide-y divide-gray-200">
                    <td class="p-4 whitespace-nowrap">{{$item->created_at}}</td>
                    <td class="p-4 whitespace-nowrap">{{$item->name}}</td>
                    <td class="p-4 whitespace-nowrap">{{$item->price}}</td>
                    <td class="p-4 whitespace-nowrap">{{$item->inStock}}</td>
                    <td class="p-4 whitespace-nowrap">{{$item->description}}</td>
                    <td class="p-4 whitespace-nowrap">{{$item->catalog_id}}</td>
                    <td class="p-4 whitespace-nowrap">
                        <div class="flex space-x-1">
                            <form action="{{route('products.edit',$item)}}" >
                                <button class="border-2 border-indigo-200 rounded-md p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-10 w-10 text-indigo-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </button>
                            </form>
                            <form action="{{route('products.destroy',$item)}}" method="post">
                                @csrf @method('delete')
                                <button class="border-2 border-red-200 rounded-md p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-10 w-10 text-red-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
