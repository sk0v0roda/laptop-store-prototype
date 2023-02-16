@extends('layout.app')

@section('content')

    <table class="table">
        <thead>
        <tr>
            <td>ID</td>
            <td>Название</td>
            <td>Цена</td>
            <td>Количество</td>
        </tr>
        </thead>
        <tbody>
        @foreach($cart->getItems() as $item)
        <tr>
            <td>{{ $item->getId() }}</td>
            <td>{{ $item->getTitle() }}</td>
            <td>{{ $item->getPrice() }}</td>
            <td>{{ $item->getQuantity() }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>

@endsection
