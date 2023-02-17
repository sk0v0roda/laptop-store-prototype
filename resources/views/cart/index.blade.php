@extends('layout.app')

@section('content')

    <table class="table">
        <thead>
        <tr>
            <td>ID</td>
            <td>Название</td>
            <td>Цена</td>
            <td>Количество</td>
            <td>Действия</td>
        </tr>
        </thead>
        <tbody>
        @foreach($cart->getItems() as $itemHash => $item)
        <tr>
            <td>{{ $item->getId() }}</td>
            <td>{{ $item->getTitle() }}</td>
            <td>{{ $item->getPrice() }}</td>
            <td>{{ $item->getQuantity() }}</td>
            <td>
                <form method="POST" action="{{ route('cart.removeItem') }}">
                    @csrf
                    @method("DELETE")
                    <input type="hidden" value="{{ $itemHash }}">
                    <button type="submit" class="btn btn-danger">Удалить товар</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

@endsection
