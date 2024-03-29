<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Магазин</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
            <!-- Бренд и кнопка «Гамбургер» -->
            <a class="navbar-brand" href="{{ route('catalog.index') }}">Li-Ning</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbar-example" aria-controls="navbar-example"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Основная часть меню -->
            <div class="collapse navbar-collapse" id="navbar-example">
                <!-- Этот блок меню -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('basket.checkout') }}">Доставка</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Контакты</a>
                    </li>
                </ul>
                <!-- Этот блок поиск -->
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search"
                        placeholder="Поиск по каталогу" aria-label="Search">
                    <button class="btn btn-outline-info my-2 my-sm-0"
                            type="submit">Искать</button>
                </form>
                <!-- Этот блок авторизация -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('basket.index') }}">Корзина</a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Войти</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.index') }}">Личный кабинет</a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>

        <div class="row">
            <div class="col-md-3">
                @include('layouts.part.roots')
            </div>
            <div class="col-md-9">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible mt-0" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Закрыть">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ $message }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible mt-0" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Закрыть">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>