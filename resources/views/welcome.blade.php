@extends('layouts.myshop')

@section('main')

    <div class="masonry-loader masonry-loader-showing">
        <div class="row products product-thumb-info-list" data-plugin-masonry data-plugin-options="{'layoutMode': 'fitRows'}">

            @forelse ($products as $itemProduct)

            <x-product.card :itemProduct='$itemProduct'/>

            @empty
                Pas de produits
            @endforelse

        </div>
    </div>

    <div>

        <h1>Products</h1>

        <ul>

            @foreach ($products as $itemProduct)
                <li>
                    {{ $itemProduct->name }}
                    <a href="{{ route('welcome.detail', $itemProduct) }}">
                        Voir plus
                    </a>
                </li>
            @endforeach

        </ul>

    </div>

@endsection