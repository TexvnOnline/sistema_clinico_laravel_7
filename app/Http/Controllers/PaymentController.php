<?php

namespace App\Http\Controllers;

use App\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;

class PaymentController extends Controller
{
    private $apiContext;
    public function __construct()
    {
        $payPalConfig = Config::get('paypal');
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $payPalConfig['client_id'],
                $payPalConfig['secret']
            )
        );
    }
    public function payWithPayPal(Invoice $invoice){
        
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new Amount();
        $amount->setTotal($invoice->amount);
        $amount->setCurrency('USD');

        $transaction = new Transaction();
        $transaction->setAmount($amount);

        // definir la url
        // $callbackUrl = url('paypal/status');

        $callbackUrl = route('paypal.status', $invoice->id);

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($callbackUrl)
            ->setCancelUrl($callbackUrl);

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);

        try {
            $payment->create($this->apiContext);
            //echo $payment;
            return redirect()->away($payment->getApprovalLink());
        }
        catch (PayPalConnectionException $ex) {
            // This will print the detailed information on the exception.
            //REALLY HELPFUL FOR DEBUGGING
            echo $ex->getData();
        }
    }
    public function payPalStatus(Request $request, $id){
        $invoice = Invoice::findOrFail($id);
        
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');
        $token = $request->input('token');
        if( !$paymentId || !$payerId || !$token ){
            // Lo sentimos. No se pudo proceder con el pago a través de PayPal. 
            return redirect()->route('patient.invoice')->with('flash', 'fallido');
        }

        $payment = Payment::get($paymentId, $this->apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        $result = $payment->execute($execution, $this->apiContext);
    
        if($result->getState() == 'approved'){
            // redireccionar a la pagia de boletas y cambiar el estado
            $invoice->update([
                'status'=> 'approved'
            ]);
            return redirect()->route('patient.invoice')->with('flash', 'pagado');
        }
        return redirect()->route('patient.invoice')->with('flash', 'fallido');
    }
}
