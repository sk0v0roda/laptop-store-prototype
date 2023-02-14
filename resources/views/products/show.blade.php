@extends('layout.app')

@section('title', 'Товар')

@section('content')
    <h1>{{ $product->name }}</h1>
    <p> {{ $product->article }}</p>
    <p> {{ $product->price }}</p>
    <p> {{ $product->description }}</p>
@endsection

