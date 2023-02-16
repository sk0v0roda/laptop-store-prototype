@extends('layout.app')

@section('title', 'Карточка товара')

@section('content')
    <div class="card">
        <div class="card-header">
            {{ $product->name }}
        </div>
        <div class="card-body">
            <p>Название: {{$product->name}}</p>
            <p>Артикул: {{$product->article}}</p>
            <p>Описание: {{$product->description}}</p>
            <p>Цена: {{$product->price}}</p>
            @auth
                <p>Кто создал: {{$product->user->name}}</p>
            @endauth
            <a href="{{ route('products.index') }}">
                <button class="btn btn-primary">Назад</button>
            </a>
        </div>
    </div>
@endsection
