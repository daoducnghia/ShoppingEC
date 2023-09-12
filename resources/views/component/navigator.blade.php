<nav class="topnav">
    <div class="logo">
        <a href="/">
            <img src="{{ asset('images/logo-nobg.png') }}" alt="" />
        </a>
    </div>
    <div class="menu">
        <ul>
            <li><a href="/product/men">Men</a></li>
            <li><a href="/product/women">Women</a></li>
            <li><a href="/product/kids">Kids</a></li>
        </ul>
    </div>
    <div class="func">
        <ul>
            @auth
                <li>
                    <form id="form-search" action="/product/search" method="get">
                        <input type="text" name="search" placeholder="Search" />
                        <button type="submit">
                            <i class="fa-solid fa-magnifying-glass fa-lg"></i>
                        </button>
                    </form>
                </li>
                <li>
                    <a href="/cart">
                        <i class="fa-solid fa-bag-shopping fa-lg"></i>
                    </a>
                </li>
                <li>
                    <div class="dropdown">
                        <button class="dropbtn"><i class="fa-regular fa-user fa-lg"></i></button>
                        <div class="dropdown-content">
                            <a href="/user" style="text-decoration: none">{{ auth()->user()->name }}</a>
                            <a href="/logout">
                                <form class="inline" action="/logout" method="POST">
                                    @csrf
                                    <button type="submit">
                                        Logout
                                    </button>
                                </form>
                            </a>
                        </div>
                    </div>
                </li>
            @else
                <li>
                    <form id="form-search" action="/product/search" method="get">
                        <input type="text" name="search" placeholder="Search" />
                        <button type="submit">
                            <i class="fa-solid fa-magnifying-glass fa-lg"></i>
                        </button>
                    </form>
                </li>
                <li>
                    <a href="/login">
                        <i class="fa-regular fa-user fa-lg"></i>
                    </a>
                </li>
            @endauth
        </ul>
    </div>
</nav>
<hr />
