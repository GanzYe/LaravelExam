<!doctype html>
<html lang="{{str_replace('_','-',app()->getLocale())}}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body class="bg-white">

<div>
    <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="relative bg-gray-50 font-size-h6">
            <div class="max-w-screen-lg mx-auto ">
                <div class="flex justify-between items-center border-b-2 border-gray-100 py-6 md:justify-start md:space-x-10">
                    <div class="flex justify-start lg:w-0 lg:flex-1">
                        <a href="/">
                            <span class="sr-only">Workflow</span>
                            <img class="h-8 w-auto sm:h-10" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="">
                        </a>

                    </div>

                    <div class="-mr-2 -my-2 md:hidden">
                        <button type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-expanded="false">
                            <span class="sr-only">Open menu</span>
                            <!-- Heroicon name: outline/menu -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>

                        </button>

                    </div>

                    <nav class=" md:flex space-x-10">
                            <a href="#" class=" font-black text-gray-500 hover:text-gray-900" aria-expanded="false">
                                <span>Товары</span>
                            </a>
                        <a href="#" class=" font-black text-gray-500 hover:text-gray-900">
                            Категории
                        </a>
                        <a href="#" class=" font-black text-gray-500 hover:text-gray-900">
                            О нас
                        </a>
                    </nav>
                    <div class=" md:flex items-center justify-end md:flex-1 lg:w-0">
                        @guest
                            <a href="{{route('login')}}" class="whitespace-nowrap  font-black text-gray-500 hover:text-gray-900">
                                Войти
                            </a>
                            <a href="{{route('register')}}" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-3 py-2 border border-transparent rounded-md shadow-sm  font-black text-white bg-indigo-600 hover:bg-indigo-700">
                                Регистрация
                            </a>

                        @else
                            <span class="whitespace-wrap  font-medium text-gray-1000 marg">{{auth()->user()->name}}
                                |
                                @role('admin')
                                <a href="{{route('adminPanel')}}" class="whitespace-nowrap  font-black text-gray-500 hover:text-gray-900">
                                    Админ панель
                                </a>
                                @endrole
                                @role('user')
                                <a href="{{route('register')}}" class="whitespace-nowrap  font-black text-gray-500 hover:text-gray-900">
                                    Аккаунт
                                </a>
                                @endrole
                            </span>
                            <a href="cart" class="ml-8 "><i class="fa fa-shopping-cart"></i> Cart</a>
                            <a href="{{route('logout')}}" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-3 py-2 border border-transparent rounded-md shadow-sm  font-black text-white bg-indigo-600 hover:bg-indigo-700" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Выйти</a>
                            <form id="logout-form" action="{{route('logout')}}" method="post">@csrf</form>
                        @endguest
                    </div>
                </div>
            </div>
        </div>

</div>
<hr/>

@yield('content')
</body>
</html>
