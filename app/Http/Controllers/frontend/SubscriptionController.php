<?php

namespace App\Http\Controllers\frontend;

use App\Models\Order;
use App\Lib\PayU\PayU;
use App\Traits\Taxable;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Traits\Transactional;
use App\Http\Controllers\Controller;

class SubscriptionController extends Controller
{
    use Transactional, Taxable;

    public function index()
    {
        if (auth()->user()->getActiveSubscription()) {
            return redirect()->route('frontend.profile')->with(toast('Subscription is already Activated.'));
        }

        $user = auth()->user();
        $transactionId = generateTransactionId();
        $amount = config('app.subscription_price');
        $productName = 'Subscription';
        $order = $this->getOrderOrCreateNew($user, $amount);

        // $data = config('payu.payu_key') . '|' . $transactionId . '|' . $amount . '|' . $productName . '|' . Str::limit($user->full_name, 20, '') . '|' . Str::limit($user->email, 50, '') . '|' . $order->api_order_id . '||||||||||' . config('payu.payu_salt');
        // $hash = hash('sha512', $data);

        $order_no = $order->api_order_id;

        $api = new PayU();
        $api->env_prod = config('payu.payu_env');
        $api->key = config('payu.payu_key');
        $api->salt = config('payu.payu_salt');
        $api->amount = config('app.subscription_price');
        $api->initGateway();
        $params['txnid'] = $transactionId;
        $params['amount'] = $amount;
        $params['productinfo'] = $productName;
        $params['firstname'] = Str::limit($user->full_name, 20, '');
        $params['lastname'] = null;
        $params['zipcode'] = null;
        $params['address1'] = null;
        $params['city'] = null;
        $params['state'] = null;
        $params['country'] = null;
        $params['email'] = Str::limit($user->email, 50, '');
        $params['phone'] = $user->mobile;
        $params['udf5'] = $order->api_order_id;

        return view('frontend.subscription', compact('user', 'amount', 'api', 'params'));
    }

    protected function getOrderOrCreateNew($user, $amount, $discount = 0)
    {
        if ($user->orders()->whereStatus('initial')->exists()) {
            $order = $user->orders()->whereStatus('initial')->latest()->first();
            [$gst, $baseAmount, $taxable] = self::extracted($amount, $discount);
            $order->update([
                // 'api_order_id' => $apiOrderNo,
                'total_amount' => $amount,
                'discount_amount' => $discount,
                'taxable_amount' => $taxable,
                'cgst_percent' => config('app.cgst'),
                'sgst_percent' => config('app.sgst'),
                'cgst' => $gst['cgst'],
                'sgst' => $gst['sgst']
            ]);
        } else {
            $order_no = generateOrderNo();
            $order = $this->createOrder($amount, [
                'api_order_id' => $order_no,
                'discount' => $discount,
            ]);
        }
        return $order;
    }
}
