<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Blog</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/dropdown.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dropdown.css') }}" rel="stylesheet">

    <!-- Icons -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
    <nav class="bg-gray-700 text-white">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
          <a class="font-semibold text-2xl" href="/">
            Blog
          </a>
          <div class="hidden lg:block">
            <ul class="inline-flex">
                <li class="py-2 px-4"><a class="font-bold" href="/">Home</a></li>
                <li class="py-2 px-4"><a class="hover:text-gray-800" href="#">About</a></li>
                <li class="py-2 px-4"><a class="hover:text-gray-800" href="#">Contact</a></li>
                <li class="py-2 px-4">
                  <div class="dropdown">
                    <i class="fa fa-user dropbtn" onclick="myFunction()"></i>
                    <div id="myDropdown" class="dropdown-content rounded overflow-hidden shadow mt-4">
                      @guest
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                      @else
                        <a href="#">{{ Auth::user()->name }}</a>

                        @canany(['isAuthor', 'isAdmin'])
                          <a href="/panel">Panel</a>
                        @endcanany

                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                      @endguest
                    </div>
                  </div>
                </li>
                @auth
                  @canany(['isAuthor', 'isAdmin'])
                    <a href="/create">
                      <button class="bg-blue-400 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Add post</button>
                    </a>
                  @endcanany
                @endauth
            </ul>
          </div>
        </div>
    </nav>

    <div class="content">
        @yield('content')
    </div>
    
</body>
</html>