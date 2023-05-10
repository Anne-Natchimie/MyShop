<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function index($category = 0)
    {
        //Lister les produits et les categories et filtrer les categories par les produits

        $products = Product::OrderBy('created_at', 'asc')->paginate(10); // liste de mes produits
        $categories = Category::OrderBy('name', 'asc')->get(); // liste de mes catégories

        if ($category != 0) {
            # code...
            $products = Product::Where('category_id', $category)->OrderBy('created_at', 'asc')->paginate(10);
        }

        return view('welcome', compact('products', 'categories')); 

    }

    public function detail(Product $product)
    {

        //selectionner 4 produits qui ont la même catégorie qu'un produit aléatoirement
        $products = Product::Where('category_id', $product->category_id)->inRandomOrder()->limit(4)->get();
        return view('detail', compact('product', 'products')); 

    }

    /*
        Méthode qui permet d'ajouter dans le caddie
        D'ajouter ou de modifier dans le caddie 
        Il vérifie si la quantité existe
        Si la quantité existe il exécute une action
    */

    public function addToCart(Product $cart)
    {

        // Vérification du produit dans le panier 
        // Sélectionner le produit quand il a été ajouté par l'utilisateur 
        // SELECT * FROM Carts WHERE user_id = "?" AND product_id = $product -> id LIMIT(0, 1) 

        dd($cart);

        $cart = Cart::Where('user_id', Auth::user()->id)
                        ->Where('product_id', $product->id)
                        ->limit(1)->get(); 

    }

}
