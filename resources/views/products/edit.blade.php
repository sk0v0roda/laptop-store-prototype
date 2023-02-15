@extends('layout.app')

@section('title', 'Изменение карточки товара')

@section('content')
    <div class="card">
        <div class="card-header">
            Товар
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('products.update', $product->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Наименование</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $product->name }}">
                </div>

                <div class="mb-3">
                    <label for="article" class="form-label">Артикул</label>
                    <input type="text" class="form-control" name="article" id="article" value="{{ $product->article }}">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Цена</label>
                    <input type="number" class="form-control" name="price" id="price" value="{{ $product->price }}">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Описание</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ $product->description }}</textarea>
                </div>

                <button type="submit" class="btn btn-success">Сохранить</button>
                <a href="{{ route('products.index') }}">
                    <button type="button" class="btn btn-primary">Отмена</button>
                </a>
            </form>
        </div>
    </div>
@endsection
