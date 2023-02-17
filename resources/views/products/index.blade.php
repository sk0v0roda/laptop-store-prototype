@extends('layout.app')

@section('title', 'Карточка товара')

@section('content')
    @role('admin')
    <a href="{{ route('products.create') }}">
        <button class="btn btn-success mb-10">Создать товар</button>
    </a>
    @endrole
    <form method="GET" action="{{ route('products.index') }}">
        <input type="text" class="form-control" name="search" id="search" placeholder="Поиск по названию" style="width: 25%">
        <div style="padding-top: 5px">
            <button type="submit" class="btn btn-secondary">Искать</button>
        </div>
    </form>
    <body>
    <div class="container">
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4" style="background-color:#cbd5e0">
                    <div class="card">
                        <div class="card-body p-5">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Артикул - {{ $product->article }}</h6>
                            <p class="card-text">{{ $product->description }}</p>
                        </div>
                        <div class="card-footer border-0 p-0 text-center">
                            @guest
                                <h3><span class="badge bg-secondary">Цена - {{ $product->price }}</span></h3>
                            @endguest
                            @role('customer')
                            <form method="POST" action="{{ route('cart.put') }}">
                                @csrf
                                @method("PUT")
                                <input type="hidden" name="product_id" value="{{ $product->id }}"/>
                                <button type="submit" class="btn btn-primary"> Купить за {{ $product->price }} </button>
                            </form>
                            @endrole
                            @role('admin')
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-secondary">
                                Редактировать </a>
                            <form method="POST" action="{{ route('products.destroy', $product->id) }}">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger"> Удалить</button>
                            </form>
                            @endrole
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </body>
    <style>
        .card {
            display: flex;
            align-items: stretch;
            margin: 10px 5px;
            height: 100%;
            padding-bottom: 10px;
        }

        .card-footer {
            background-color: #ffffff
        }

        .btn {
            padding-bottom: 10px;
            margin-bottom: 10px;
        }

        .col-md-4 {
            margin-bottom: 10px;
        }
    </style>
@endsection
