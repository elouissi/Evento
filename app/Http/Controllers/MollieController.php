<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Commande;
use App\Models\Evenement;
use Illuminate\Http\Request;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Mollie\Laravel\Facades\Mollie;
use Ramsey\Uuid\Type\Decimal;
use Symfony\Component\VarDumper\VarDumper;

class MollieController extends Controller
{
 
    public function mollie(Request $request)
    {
        session_start();

 
        
        $order_total_number = number_format($request->input('prix'), 2);
        $decimal_num_dec = str_replace(',', '', $order_total_number);
        $capacity = $request->input('capacity');
        $tickets_vendus = $request->input('tickets_vendus');
        $new_tickets_vendus =$tickets_vendus +1;

        $new_capacity = $capacity - 1;

        $payment = Mollie::api()->payments->create([
            "amount" => [
                "currency" => "EUR",
                "value" => $decimal_num_dec,    
            ],
            "description" => "Payment event",
            "redirectUrl" => route('success'),
        ]);

        // dd($payment);

        session()->put('paymentId', $payment->id);
        session()->put('product_name', $request->input('titre'));
        session()->put('new_capacity', $new_capacity);
        session()->put('new_tickets_vendus', $new_tickets_vendus);
 
    
        // redirect customer to Mollie checkout page
        return redirect($payment->getCheckoutUrl(), 303);
    }

    public function success(Request $request)
    {
      
        $paymentId = session()->get('paymentId');
        $product_name = session()->get('product_name');
        $new_capacity = session()->get('new_capacity');
        $new_tickets_vendus = session()->get('new_tickets_vendus');
         // dd($products_quantites);
        $payment = Mollie::api()->payments->get($paymentId);
        if($payment->isPaid())
        {
            // create payment commande
            $obj = new Payment();
            $obj->payment_id = $paymentId;
            $obj->amount = $payment->amount->value;
            $obj->currency = $payment->amount->currency;
            $obj->payment_status = "Completed";
            $obj->payment_method = "Bank";
            $obj->user_id = Auth::id();
            $obj->product_name = $product_name;
            $obj->save();


            Evenement::where('titre',$product_name)->update([
                'capacity' => $new_capacity,
                'tickets_vendus' =>$new_tickets_vendus
            ]);
            // // create commands
            // foreach ($products_quantites as $produit_id => $qte) {
            //     Commande::create([
            //         "produit_id" => $produit_id,
            //         "user_id" => Auth::id(),
            //         "qte" => $qte,
            //         "numero_commande" => $paymentId,
            //     ]);
            // }

            // delete the cart of user²

            session()->forget('paymentId');

            // Cart::where('user_id',Auth::id())->delete();

            // session()->forget('order_total');
            // session()->forget('products_quantites');

            return redirect()->route('profile');
        } else {
            return redirect()->route('cancel');
        }
    }

    public function cancel()
    {
        echo "Payment is cancelled.";
    }
}