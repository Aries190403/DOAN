<header>
    @php $producttypesHtml = \App\Helpers\Helper::producttypes($producttypes); @endphp
    <!-- Header desktop -->
    <div class="container-menu-desktop">

        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop container">

                <!-- Logo desktop -->
                <a href="#" class="logo">
                    <img src="/template/images/icons/logo-01.png" alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li class="active-menu"><a href="/">Home</a> </li>

                        {!! $producttypesHtml !!}

                        <li>
                            <a href="contact.html">Contact</a>
                        </li>
                    </ul>
                </div>

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                        <i class="zmdi zmdi-search"></i>
                    </div>

                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="{{ !is_null(session('cart')) ? count(session('cart')) : 0 }}">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>


                    {{-- sử lý nút login, log out, --}}
                    @guest
                    <div class="user-dropdown icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-person">
                        <i class="zmdi zmdi-account-o"></i>
                        <div class="dropdown-content">
                            <a href="/login"><i class="zmdi zmdi-account"> Log in</i></a>
                            <a href="/register"><i class="zmdi zmdi-account-add"> Sign up</i></a>
                            <!-- <a href="#">Link 2</a> -->
                        </div>
                    </div>
                    @endguest
                    @auth
                    <div class="user-dropdown icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-person">
                        <i class="zmdi zmdi-account"></i>
                        <div class="dropdown-content">
                            <!-- <a href="/login"><i class="zmdi zmdi-account"> Log in</i></a> -->
                            <!-- <a href="#">Link 2</a> -->
                            <a href="/login"><i class="zmdi zmdi-format-list-bulleted"></i>
                                Your profile</a>
                            <a>
                                <form method="post" action="{{ route('logout') }}">
                                    @csrf
                                    <input type="submit" class="nav-link" value="Log out">
                                </form>
                            </a>
                        </div>
                    </div>
                    @endauth
                    {{-- end code --}}

                </div>
            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->
        <div class="logo-mobile">
            <a href="index.html"><img src="/template/images/icons/logo-01.png" alt="IMG-LOGO"></a>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                <i class="zmdi zmdi-search"></i>
            </div>

            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
                <i class="zmdi zmdi-shopping-cart"></i>
            </div>
        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="main-menu-m">
            <li class="active-menu"><a href="/">Home</a> </li>

            {{!! $producttypesHtml !!}}

            <li>
                <a href="contact.html">Contact</a>
            </li>

        </ul>
    </div>

    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                <img src="/template/images/icons/icon-close2.png" alt="CLOSE">
            </button>

            <form class="wrap-search-header flex-w p-l-15">
                <button class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="plh3" type="text" name="search" placeholder="Search...">
            </form>
        </div>
    </div>
</header>