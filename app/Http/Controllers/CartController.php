<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    /**
     * Ajoute un produit au panier.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add(Request $request, $id)
    {
        // Récupérer le produit par ID
        $product = Product::findOrFail($id);

        // Obtenir la quantité demandée depuis la requête, 1 comme valeur par défaut
        $quantity = (int) $request->input('quantity', 1);

        // Vérifier si la quantité demandée est supérieure à zéro
        if ($quantity <= 0) {
            return redirect()->back()->with('error', 'La quantité doit être supérieure à zéro.');
        }

        // Vérifier si la quantité demandée dépasse le stock disponible
        if ($quantity > $product->stock) {
            return redirect()->back()->with('error', 'La quantité demandée dépasse le stock disponible.');
        }

        // Récupérer le panier actuel depuis la session, ou un tableau vide s'il n'existe pas
        $cart = session()->get('cart', []);

        // Vérifier si le produit est déjà dans le panier
        if (isset($cart[$id])) {
            // Si le produit est déjà dans le panier, augmenter la quantité
            $cart[$id]['quantity'] += $quantity;
        } else {
            // Ajouter un nouveau produit dans le panier
            $cart[$id] = [
                'namep' => $product->name,
                'description' => $product->description,
                'price' => $product->price,
                'quantity' => $quantity,
                'image_url' => $product->image_url, // Assurez-vous d'utiliser l'attribut 'image_url' du modèle Product
            ];
        }

        // Mettre à jour la session avec le panier
        session()->put('cart', $cart);

        // Retourner un message de succès et rediriger l'utilisateur
        return redirect()->route('cart.index')->with('success', 'Produit ajouté au panier avec succès !');
    }

    /**
     * Affiche le contenu du panier.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Récupérer le panier de la session
        $cart = session()->get('cart', []);

        // Retourner la vue avec les données du panier
        return view('cart.index', compact('cart'));
    }

    /**
     * Supprime un produit du panier.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove($id)
    {
        // Récupérer le panier de la session
        $cart = session()->get('cart', []);

        // Vérifier si le produit est dans le panier
        if (isset($cart[$id])) {
            // Supprimer le produit du panier
            unset($cart[$id]);

            // Mettre à jour la session avec le panier modifié
            session()->put('cart', $cart);
        }

        // Retourner un message de succès et rediriger l'utilisateur
        return redirect()->back()->with('success', 'Produit retiré du panier avec succès !');
    }

    /**
     * Met à jour la quantité d'un produit dans le panier.
     *
     * @param int $id
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, Request $request)
    {
        // Récupérer le panier actuel depuis la session
        $cart = session()->get('cart', []);

        // Vérifier si le produit est dans le panier
        if (isset($cart[$id])) {
            // Mettre à jour la quantité du produit
            $quantity = $request->input('quantity', 1);

            // Vérifier si la quantité est valide
            if ($quantity <= 0) {
                return redirect()->back()->with('error', 'La quantité doit être supérieure à zéro.');
            }

            // Mettre à jour la quantité du produit dans le panier
            $cart[$id]['quantity'] = $quantity;

            // Mettre à jour la session avec le panier modifié
            session()->put('cart', $cart);

            // Retourner un message de succès et rediriger l'utilisateur
            return redirect()->route('cart.index')->with('success', 'Panier mis à jour.');
        }

        // Si le produit n'est pas trouvé dans le panier
        return redirect()->route('cart.index')->with('error', 'Produit non trouvé dans le panier.');
    }
}