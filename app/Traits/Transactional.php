<?php

namespace App\Traits;

use App\Models\Invoice;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Plan;
use App\Models\SiData;
use App\Models\Transaction;
use App\Models\Workshop;
use Illuminate\Support\Facades\Auth;

trait Transactional
{
    /**
     * @param float $amount
     * @param array $options
     * @return Order
     */
    public static function createOrder(float $amount, array $options = []): Order
    {
        $options['discount_amount'] = $options['discount_amount'] ?? 0;
        [$gst, $baseAmount, $taxable] = self::extracted($amount, $options['discount_amount']);
        return Order::create([
            'user_id' => $options['user_id'] ?? Auth::id(),
            'api_order_id' => $options['api_order_id'] ?? null,
            'total_amount' => $amount - $options['discount_amount'],
            'discount_amount' => $options['discount_amount'],
            'taxable_amount' => $taxable,
            'cgst_percent' => config('app.cgst'),
            'sgst_percent' => config('app.sgst'),
            'cgst' => $gst['cgst'],
            'sgst' => $gst['sgst'],
            'status' => $options['status'] ?? 'initial',
            'mode' => $options['mode'] ?? 'online',
        ]);
    }

    public static function createTransaction($data): void
    {
        Transaction::create($data);
    }

    // public static function createInvoice($data): void
    // {
    //     Invoice::create($data);
    // }

    public static function updateOrder(Order $order, int $amount, int $discount): void
    {
        $order->update([
            'total_amount' => $amount,
            'discount_amount' => $discount,
            'status' => 'completed'
        ]);
        // dd($order);
    }

    public static function __callStatic($method, $arguments)
    {
        if (!method_exists(__CLASS__, $method)) {
            throw new \BadMethodCallException(sprintf('method "%s" does not exist', $method));
        }

        return (self::Transactional)->$method(...$arguments);
    }
}
