@extends('layouts.site')

@section('content')
    <h1>Ваша корзина</h1>
    @if (count($products))
        @php
            $basketCost = 0;
        @endphp
        <table class="table table-bordered">
            <tr>
                <th>№</th>
                <th>Наименование</th>
                <th>Цена</th>
                <th>Кол-во</th>
                <th>Стоимость</th>
            </tr>
            @foreach($products as $product)
                @php
                    $itemPrice = $product->price;
                    $itemQuantity =  $product->pivot->quantity;
                    $itemCost = $itemPrice * $itemQuantity;
                    $basketCost = $basketCost + $itemCost;
                @endphp
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <a href="{{ route('catalog.product', [$product->slug]) }}">
                            {{ $product->name }}
                        </a>
                    </td>
                    <td>{{ number_format($itemPrice, 2, '.', '') . ' ' . 'сом' }}</td>
                    <td>
                        <form action="{{ route('basket.minus', ['id' => $product->id]) }}"
                              method="post" class="d-inline">
                            @csrf
                            <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                            <img src="{{ asset('img/minus.png') }}" alt="" class="img-fluid">
                            </button>
                        </form>
                        <span class="mx-1">{{ $itemQuantity }}</span>
                        <form action="{{ route('basket.plus', ['id' => $product->id]) }}"
                              method="post" class="d-inline">
                            @csrf
                            <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                            <img src="{{ asset('img/plus.png') }}" alt="" class="img-fluid">
                            </button>
                        </form>
                    </td>
                    <td>{{ number_format($itemCost, 2, '.', '') . ' ' . 'сом' }}</td>
                    <td>
                        <form action="{{ route('basket.remove', ['id' => $product->id]) }}"
                              method="post">
                            @csrf
                            <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                <img src="{{ asset('img/delete.png') }}" alt="" class="img-fluid">
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <tr>
                <th colspan="4" class="text-right">Итого : </th>
                <th>{{ number_format($basketCost, 2, '.', '') . ' ' . 'сом' }}</th>
            </tr>
        </table>
        <a href="{{ route('basket.checkout') }}" class="btn btn-success float-right">
            Оформить заказ
        </a>
    @else
        <p>Ваша корзина пуста, скорее пополняйте ее :)</p>
    @endif
@endsection