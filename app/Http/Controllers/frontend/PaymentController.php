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
use App\Traits\Transactional;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class PaymentController extends Controller
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

    public function success(Request $request)
    {
        $order = Order::where('api_order_id', $request->udf5)->first();
        if ($order) {
            $order->update(['status' => 'completed']);
            return view('frontend.payment-successful');
        }
        return view('frontend.payment-failed');
    }

    public function failed(Request $request)
    {
        // dd($request);
        $order = Order::where('api_order_id', $request->udf5)->first();
        if ($order) {
            $order->update(['status' => 'failed']);
        }
        return view('frontend.payment-failed');
    }

    protected function createTransaction($request, $order, $status)
    {
        $transaction = Transaction::create([
            'order_id' => $order->id,
            'pg_payment_id' => $request->mihpayid,
            'transaction_id' => $request->txnid,
            'pg_status' => $request->status,
            'transaction_date' => $request->addedon,
            'amount' => $request->amount,
            'payment_type' => $request->mode,
            'pg_response' => $request->PG_TYPE,
            'status' => $status,
            'pg_error_response' => $request->error_Message,
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
