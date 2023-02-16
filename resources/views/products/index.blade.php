@extends('layout.app')

@section('title', 'Карточка товара')

@section('content')
    <button class="btn btn-success">Создать товар</button>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
            <th scope="col">Артикул</th>
            <th scope="col">Описание</th>
            <th scope="col">Цена</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->article }}</td>
                <td>{{ $product->description  }}</td>
                <td>{{ $product->price  }}</td>
                <td>
                    @can('product.show')
                        <a href="{{ route('products.show', $product->id) }}">
                            <button class="btn btn-primary btn-sm">Просмотреть</button>
                        </a>
                    @endcan
                    <a href="{{ route('products.edit', $product->id) }}">
                        <button class="btn btn-info btn-sm">Изменить</button>
                    </a>
                    @can('product.destroy')
                        <a>
                            <form method="POST" action="{{ route('products.destroy', $product->id) }}">
                                @csrf
                                @method("DELETE")
                                <button class="btn btn-danger btn-sm">Удалить</button>
                            </form>
                        </a>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
