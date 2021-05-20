@extends('layouts.site')

@section('content')
<h1>Интернет-магазин Li-Ning</h1>

    <p>
    Мужской бренд спортивной одежды, обуви и аксессуаров.
    </p>

    <h2>Категории товаров</h2>
    <div class="row">
        @foreach ($roots as $root)
            @include('catalog.part.category', ['category' => $root])
        @endforeach
    </div>
@endsection