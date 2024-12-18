<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;

class PaymentController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$clientKey = config('midtrans.client_key');
        Config::$isProduction = config('midtrans.is_production');
    }

    public function createPayment(Request $request)
    {
        $transaction_details = [
            'order_id' => 'order-id-' . time(),
            'gross_amount' => 100000,
        ];

        $item_details = [
            [
                'id' => 'item-01',
                'price' => 100000,
                'quantity' => 1,
                'name' => 'Product Name'
            ]
        ];

        $billing_address = [
            'first_name'    => 'John',
            'last_name'     => 'Doe',
            'address'       => 'Bandung',
            'city'          => 'Bandung',
            'postal_code'   => '40122',
            'phone'         => '081234567890',
            'country_code'  => 'IDN'
        ];

        $customer_details = [
            'first_name'    => "John",
            'last_name'     => "Doe",
            'email'         => "john.doe@example.com",
            'phone'         => "081234567890",
            'billing_address'=> $billing_address
        ];

        $transaction_data = [
            'payment_type' => 'credit_card',
            'transaction_details' => $transaction_details,
            'item_details' => $item_details,
            'customer_details' => $customer_details
        ];

        try {
            $snap_token = Snap::getSnapToken($transaction_data);
            return response()->json(['token' => $snap_token]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function paymentCallback(Request $request)
    {
        // Handle Midtrans callback and verify the transaction
        $notification = new \Midtrans\Notification();

        $status = $notification->transaction_status;
        $order_id = $notification->order_id;
        $payment_type = $notification->payment_type;

        // Update the payment status in your database accordingly
        if ($status == 'success') {
            // Handle success
        } else {
            // Handle failure or pending
        }

        return response('OK', 200);
    }
}
