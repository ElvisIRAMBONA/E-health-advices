<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;

class CheckoutController extends Controller
{
    public function showForm()
    {
        return view('checkout.form');
    }

    public function process(Request $request)
    {
        // Vérifier si l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter pour passer une commande.');
        }

        // Valider les données du formulaire
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'zip' => 'required|string|max:10',
            'payment_method' => 'required|string|in:credit_card,paypal,bank_transfer',
            'card_number' => 'required|string|max:16',
            'expiry_date' => 'required|string|max:5',  // exemple : MM/YY
            'cvv' => 'required|string|max:4',
        ]);

        // Démarrer une transaction
        DB::beginTransaction();

        try {
            // Enregistrer la commande dans la base de données
            $order = new Order();
            $order->user_id = Auth::id();
            $order->name = $request->input('name');
            $order->email = $request->input('email');
            $order->phone = $request->input('phone');
            $order->address = $request->input('address');
            $order->city = $request->input('city');
            $order->zip = $request->input('zip');
            $order->payment_method = $request->input('payment_method');
            $order->card_number = $request->input('card_number');
            $order->status = 'Pending';
            $order->total = 100.00; // Remplacer par le montant total réel
            $order->save();

            // Simulation de traitement de paiement
            $paymentSuccessful = $this->processPayment(
                $request->input('card_number'),
                $request->input('expiry_date'),
                $request->input('cvv'),
                $order->total
            );

            if (!$paymentSuccessful) {
                throw new Exception("Le paiement a échoué. Veuillez vérifier vos informations de carte.");
            }

            // Mettre à jour le statut de la commande si le paiement réussit
            $order->status = 'Paid';
            $order->save();

            // Valider la transaction si tout est réussi
            DB::commit();

            // Rediriger vers la page de succès
           // return redirect()->route('checkout.success')->with('message', 'Votre commande a été passée avec succès.');
            return redirect()->route('admin.orders.index')->with('success', 'Votre commande a été passée avec succès.');

        } catch (Exception $e) {
            // Annuler la transaction en cas d'erreur
            DB::rollBack();
            return redirect()->route('checkout.form')->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Simule un traitement de paiement.
     *
     * @param  string  $cardNumber
     * @param  string  $expiryDate
     * @param  string  $cvv
     * @param  float   $amount
     * @return bool
     */
    protected function processPayment($cardNumber, $expiryDate, $cvv, $amount)
    {
        // Logique de simulation (toujours réussite pour cet exemple)
        return true; // Toujours réussite
    }
}