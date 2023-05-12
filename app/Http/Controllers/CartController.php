<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //

    public function index()
    {
        # code...
        $carts = Cart::Where('user_id', Auth::user()->id)->get(); 
        return view('cart', compact('carts')); 
    }

    
    /*
        Méthode qui permet d'ajouter dans le caddie
        D'ajouter ou de modifier dans le caddie 
        Il vérifie si la quantité existe
        Si la quantité existe il exécute une action
    */

    public function addToCart(Product $product)
    {

        // Vérification du produit dans le panier 
        // Sélectionner le produit quand il a été ajouté par l'utilisateur 
        // SELECT * FROM Carts WHERE user_id = "?" AND product_id = $product -> id LIMIT(0, 1) 

        $cart = Cart::Where('user_id', Auth::user()->id)
                        ->Where('product_id', $product->id)
                        ->first(); 

        // Penser à controler l'existence du produit 

        if (isset($cart)) {

            // UPDATE Carts SET quantity = 1 WHERE id = 1

            Cart::Where('id', $cart->id)->update(['quantity' => $cart->quantity +1]);

        } else {

            Cart::Create([
                "user_id" => Auth::user()->id,
                "product_id" => $product->id,
                "quantity" => 1, 
                "price" => $product->price
            ]); 

        }; 

        // Ajouter ou supprimer le produit 

        return redirect(route('cart')); 

    }

    public function delete(Type $var = null)
    {
        # code...
    }

}
