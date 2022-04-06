<nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: rgb(11,102,35); min-height: 70px;">
    <div class="container-fluid">
        @guest()
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        @else
            @if(auth()->user()->level == 'Admin')
                <a class="navbar-brand" href="{{ url('/Admin') }}">Administrator</a>
                @elseif(auth()->user()->level == 'Officer')
                <a class="navbar-brand" href="{{ url('/Officer') }}">Extension Officer</a>
                @elseif(auth()->user()->level == 'Farmer')
                <a class="navbar-brand" href="{{ url('/Farmer') }}">Farmer</a>
                @else
                <a class="navbar-brand" href="{{ url('/Investor') }}">Investor</a>
                @endif
            @endguest
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('soil.index') }}">@fas('mountain') Soil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('calendar.index') }}">@fas('calendar-week') Calendar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('market.index') }}" >@fas('cart-arrow-down') Market</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=" {{ route('blog.index') }} ">@fas('blog') Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">@fas('sign-in-alt') {{ __('Login') }}</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>@fas('user-plus') Register</a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('register') }}">@fas('user-alt') Farmer</a>
                            <a class="dropdown-item" href="{{ route('officers.create') }}"> @fas('user-md') Extension Officers</a>
                            <a class="dropdown-item" href="{{ route('investors.create') }}"> @fas('user-tag') Investors</a>
                        </div>
                    </li>
                @else
                    @if(auth()->user()->level == 'Admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users.index') }} ">@fas('user')Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('calendar.index') }}">@fas('calendar-week')  Calender</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('soil.index') }}">@fas('mountain') Soils</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('market.index') }}">@fas('cart-arrow-down')  Markets</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=" {{ route('blog.index') }} ">@fas('blog') Blog</a>
                        </li>
                        @elseif(auth()->user()->level == 'Farmer')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('calendar.index') }}">@fas('calendar-week') Farming Calendar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('market.index') }}">@fas('cart-arrow-down')  Markets</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('soil.index') }}">@fas('mountain') My Soil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('service.index') }}">@fas('globe') Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('support.index') }}">@fas('handshake') Support</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=" {{ route('blog.index') }} ">@fas('blog') Blog</a>
                        </li>
                        @elseif(auth()->user()->level == 'Officer')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('calendar.index') }}">@fas('calendar-week') Calendar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('soil.index') }}">@fas('mountain') Soils</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/client') }}">Clients</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('market.index') }}" >@fas('cart-arrow-down')  Market</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=" {{ route('blog.index') }} ">@fas('blog') Blog</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('market.index') }}">@fas('cart-arrow-down')  Market</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('soil.index') }}">@fas('mountain') Soil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('calendar.index') }}">@fas('calendar-week') Calendar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('support.index') }}">@fas('handshake') My Support</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=" {{ route('blog.index') }} ">@fas('blog') Blog</a>
                        </li>
                        @endif
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            @fas('users-cog') Profile <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @if(Auth::user()->level == 'Admin')
                                <a class="dropdown-item" href="{{ route('website.index') }}">
                                    @fas('cogs') Website View
                                </a>
                            @endif
                            <a class="dropdown-item" href="#">
                                @fas('user-tie') {{ Auth::user()->name }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                               @fas('power-off') {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
