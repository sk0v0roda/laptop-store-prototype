@extends('layout.app')

@section('title', 'Карточка товара')

@section('content')
    @role('admin')
    <a href="{{ route('products.create') }}">
        <button class="btn btn-success mb-10">Создать товар</button>
    </a>
    @endrole
    <body>
    <div class="container">
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body p-5">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Артикул - {{ $product->article }}</h6>
                            <p class="card-text">{{ $product->description }}</p>
                        </div>
                        <div class="card-footer border-0 p-0 text-center">
                            @role('customer')
                            <a href="#" class="btn btn-primary"> Купить за {{ $product->price }} </a>
                            @endrole
                            @role('admin')
                            <a href="#" class="btn btn-secondary"> Редактировать </a>
                            <a href="#" class="btn btn-danger"> Удалить </a>
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
        }

        .card-footer {
            background-color: #ffffff
        }

        .btn {
            padding-bottom: 10px;
            margin-bottom: 10px;
        }
    </style>
@endsection
