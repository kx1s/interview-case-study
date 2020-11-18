<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @stack('head')
</head>


<body class="bg-gray-100">
    <!-- Header from - https://tailwindui.com/components/marketing/elements/headers -->

    <div class="relative bg-white" id="header">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="flex justify-between items-center py-6 md:justify-start md:space-x-10">
                <div class="-ml-2 -my-2 md:hidden">
                    <button type="button" @click="mobileMenuOpen = true" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <!-- Heroicon name: menu -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
                <div class="lg:w-0 lg:flex-1">
                    <a href="/" class="flex font-bold hover:text-gray-500">
                        Supply Cart
                    </a>
                </div>
                <div class="-mr-2 -my-2 md:hidden">
                    <a  @click="cartOpen = !cartOpen" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="flex-shrink-0 h-6 w-6 text-blue-600  hover:text-gray-900 focus:text-gray-900" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </a>
                </div>
                <nav class="hidden md:flex space-x-10">
                    <a href="/shop" class="text-base leading-6 font-medium text-gray-500 hover:text-gray-900 focus:outline-none focus:text-gray-900 transition ease-in-out duration-150">
                        Shop
                    </a>

                    <a href="/product/1" class="text-base leading-6 font-medium text-gray-500 hover:text-gray-900 focus:outline-none focus:text-gray-900 transition ease-in-out duration-150">
                        Sample Product
                    </a>

                    <a href="/orders" class="text-base leading-6 font-medium text-gray-500 hover:text-gray-900 focus:outline-none focus:text-gray-900 transition ease-in-out duration-150">
                        Orders
                    </a>
                </nav>

                <div class="hidden md:flex items-center justify-end space-x-8 md:flex-1 lg:w-0">
                    <a @click="cartOpen = !cartOpen" class="whitespace-no-wrap focus:outline-none ">
                        <svg class="flex-shrink-0 h-6 w-6 text-blue-600  hover:text-gray-900 focus:text-gray-900" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </a>
                    @auth
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="whitespace-no-wrap text-base leading-6 font-medium text-gray-500 hover:text-gray-900 focus:outline-none focus:text-gray-900">
                        Logout
                    </a>
                    @endauth
                </div>
            </div>
        </div>

        <transition enter-active-class="transition duration-200 ease-out" leave-active-class="transition duration-100 ease-in" enter-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
            <div v-if="mobileMenuOpen" class="absolute top-0 inset-x-0 p-2 transition transform origin-top-left md:hidden">
                <div class="rounded-lg shadow-lg">
                    <div class="rounded-lg shadow-xs bg-white divide-y-2 divide-gray-50">
                        <div class="pt-5 pb-6 px-5 space-y-6">
                            <div class="flex items-center">
                                <div class="-mr-2">
                                    <button @click="mobileMenuOpen = false" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                        <!-- Heroicon name: x -->
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="ml-3">
                                    <a href="/" class="flex font-bold hover:text-gray-500">
                                        Supply Cart
                                    </a>
                                </div>
                            </div>
                            <div>
                                <nav class="grid gap-y-8">
                                    <a href="/shop" class="-m-3 p-3 flex items-center space-x-3 rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                                        <svg class="flex-shrink-0 h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd" />
                                        </svg>
                                        <div class="text-base leading-6 font-medium text-gray-900">
                                            Shop
                                        </div>
                                    </a>
                                    <a href="/product/1" class="-m-3 p-3 flex items-center space-x-3 rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                                        <svg class="flex-shrink-0 h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 26 26" stroke="currentColor">
                                            <path fill-rule="evenodd" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                        </svg>
                                        <div class="text-base leading-6 font-medium text-gray-900">
                                            Sample Product
                                        </div>
                                    </a>
                                    <a href="/orders" class="-m-3 p-3 flex items-center space-x-3 rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                                        <svg class="flex-shrink-0 h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 26 26" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                        </svg>
                                        <div class="text-base leading-6 font-medium text-gray-900">
                                            Orders
                                        </div>
                                    </a>
                                </nav>
                            </div>
                        </div>
                        <div class="py-6 px-5 space-y-6">
                            <div class="space-y-6">
                                <span class="w-full flex rounded-md shadow-sm">
                                    <a href="/cart" class="w-full flex items-center justify-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-700 transition ease-in-out duration-150">
                                        View Cart
                                    </a>
                                </span>
                                @auth
                                <p class="text-center text-base leading-6 font-medium text-gray-500">
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-blue-600 hover:text-blue-500 transition ease-in-out duration-150">
                                        Logout
                                    </a>
                                </p>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        <transition enter-active-class="transition duration-200 ease-out" leave-active-class="transition duration-100 ease-in" enter-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
            <div v-if="cartOpen" class="fixed top-10 right-0 max-w-xs w-full h-auto px-6 py-4 transition duration-300 transform overflow-y-auto bg-white border-2 border-gray-300" style="max-height: 90vh;">
                <div class="flex items-center justify-between">
                    <h3 class="text-2xl font-medium text-gray-700">Your cart</h3>
                    <button @click="cartOpen = !cartOpen" class="text-gray-600 focus:outline-none">
                        <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <hr class="my-3">
                <div id="cartProducts">
             
                    @forelse (Session::get('cart', []) as $product)
                    <div class="flex justify-between mt-6 pb-2 border-b">
                        <div class="flex">
                            <img class="h-20 w-20 object-cover rounded" src="{{$product->image_path}}" alt="">
                            <div class="mx-3">
                                <h3 class="text-sm font-bold">{{$product->name}}</h3>
                                <div class="flex text-gray-700 mt-2">{{$product->qty}} x RM{{number_format($product->price, 2)}}</div>
                            </div>
                        </div>
                        <div class="flex">{{number_format($product->total, 2)}}</div>
                    </div>
                    @empty
                    <p class="font-bold text-2xl text-center">No items in cart.</p>
                    @endforelse
               
                </div>
                <a href="/cart" class="flex justify-center bg-blue-500 mt-3 font-semibold hover:bg-blue-600 py-3 text-sm text-white uppercase w-full m-3">
                    <span>View Cart</span>
                </a>
            </div>
        </transition>
    </div>
    <div id="app">
        @yield('content')
    </div>

</body>

</html>