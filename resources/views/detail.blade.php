<div>

    <h1>{{$product->name}}</h1>
    <p>{{$product->description}}</p>
    <p>{{$product->price}}</p>

</div>

<div>

    <a href="{{route('addtocart', $product)}}">
        Ajouter au panier
    </a>

</div>

<div>

    <h1>Produits Similaires</h1>

    @forelse ($products as $itemProduct)

    <li>
        {{$itemProduct->name}}
    </li>
        
    @empty
        
    @endforelse

</div>