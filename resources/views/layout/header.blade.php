<header class="p-3 mb-3 border-bottom" style="background-color: #cbd5e0">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{ route('products.index') }}" class="nav-link px-2 link-dark">Главная</a></li>
            </ul>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><h3>Laptop store</h3></li>
            </ul>

            <div class="dropdown text-end">
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1"
                   data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://2020.fit-m.org/public/img/com/%D0%A1%D0%B0%D0%BB%D0%B5%D1%85.png" alt="mdo" class="rounded-circle" width="32" height="32">
                </a>
                <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                    @guest
                        <li><a class="dropdown-item" href="{{ route('login') }}">Войти</a></li>
                    @else
                        <li><a class="dropdown-item" href="#">Профиль</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">Выйти</button>
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</header>
