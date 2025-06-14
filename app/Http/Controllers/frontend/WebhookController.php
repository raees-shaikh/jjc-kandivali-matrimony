<?php

namespace App\Http\Controllers\frontend;

use Carbon\Carbon;
use App\Models\Order;
use App\Lib\PayU\PayU;
use App\Models\Invoice;
use App\Models\Transaction;
use Illuminate\Support\Str;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class WebhookController extends Controller
{

    protected $api;

    public function __construct()
    {
        $this->api = new PayU();
        $this->api->env_prod = config('payu.payu_env');
        $this->api->key = config('payu.payu_key');
        $this->api->salt = config('payu.payu_salt');
        $this->api->amount = config('app.subscription_price');
        $this->api->initGateway();
    }

    public function handle(Request $request)
    {
        // dd($request);
        $order = Order::where('api_order_id', $request->udf5)->first();
        $this->api->txnid = $request->txnid;

        if ($order) {
            $params = $this->formatParams($request, $order);
            // dd($params);
            $this->api->params = $params;
            if ($this->api->verifyHash($this->api->params)) {
                // dd('success');
                $verifyTransaction = $this->api->getTransactionByTxnId($request->txnid);
                if ($verifyTransaction && $verifyTransaction['transaction_amount'] == $order->total_amount) {

                    if ($verifyTransaction['status'] == 'success') {

                        $transaction = Transaction::where('pg_payment_id', $request->mihpayid)->first();
                        // dd($transaction);
                        if ($transaction) {
                            $transaction->update([
                                'pg_status' => $request->status,
                                'status' => 'completed',
                            ]);
                        } else {
                            $transaction = $this->createTransaction($request, $order, 'completed');
                        }

                        // dd($order->subscription);
                        if (!$order->subscription) {
                            $activeSubscription = $order->user->getActiveSubscription();
                            if ($activeSubscription) {
                                $activeSubscription->update([
                                    'is_active' => false
                                ]);
                            }

                            $subscription = Subscription::create([
                                'user_id' => $order->user_id,
                                'order_id' => $order->id,
                                'start_date' => Carbon::now(),
                                'end_date' => Carbon::now()->addMonths(config('app.subscription_months')),
                                'is_active' => 1
                            ]);
                        }

                        // dd($order->invoice);
                        if (!$order->invoice) {
                            $invoice = Invoice::create([
                                'user_id' => $order->user_id,
                                'order_id' => $order->id,
                                'invoice_date' => $request->addedon,
                            ]);
                        }

                        $order->update([
                            'status' => 'completed'
                        ]);

                        return response()->json([
                            'status' => 'success'
                        ], 200);
                    } else {

                        $transaction = $this->createTransaction($request, $order, 'failed');
                        $order->update([
                            'status' => 'failed',
                        ]);

                        return response()->json([
                            'status' => 'success',
                            'message' => 'Order Failed'
                        ], 200);
                    }
                }
            }
        }
        return response()->json([
            'status' => 'failed',
            'message' => 'Order Not Available.'
        ], 500);
    }

    protected function createTransaction($request, $order, $status)
    {
        try {
            $date = Carbon::parse($request->addedon);
        } catch (\Exception $e) {
            $date = $order->created_at;
        }

        $transaction = Transaction::create([
            'order_id' => $order->id,
            'pg_payment_id' => $request->mihpayid,
            'transaction_id' => $request->txnid,
            'pg_status' => $request->status,
            'transaction_date' => $date,
            'amount' => $request->amount,
            'payment_type' => $request->mode,
            'pg_response' => $request->PG_TYPE,
            'status' => $status,
            'pg_error_response' => urldecode($request->error_Message),
        ]);
        return $transaction;
    }

    protected function formatParams($request, $order)
    {

        $format_params['key'] = $this->api->key;
        $format_params['txnid'] = $request->txnid;
        $format_params['amount'] = $order->total_amount;
        $format_params['productinfo'] = 'Subscription';
        $format_params['firstname'] = Str::limit($order->user->full_name, 20, '');
        $format_params['email'] = Str::limit($order->user->email, 50, '');
        $format_params['udf5'] = $order->api_order_id;
        $format_params['hash'] = $request->hash;
        $format_params['status'] = $request->status;

        return $format_params;
    }
}
