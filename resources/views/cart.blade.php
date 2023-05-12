<h1>Panier</h1>

<div>
    @forelse ($carts as $itemCart)
        {{$itemCart->id}}
    @empty
        
    @endforelse
</div>