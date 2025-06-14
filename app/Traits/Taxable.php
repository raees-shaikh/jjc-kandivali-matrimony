<?php

namespace App\Traits;

trait Taxable {
    /**
     * @param $amount
     * @param $disc
     * @return array
     */

    protected function calculated($amount): array
    {
        // $gst = gst($amount);
        // $subTotal = $amount - $gst['total'];
        $promoDiscount = session()->get('discount') ?? 0.0;
        $totalDiscount = $promoDiscount;
        $subTotal = $amount - $totalDiscount;
        $gst = gst($subTotal);
        $grandTotal = $subTotal;
        return array($subTotal, $promoDiscount, $grandTotal, $gst);
    }

    protected static function extracted($amount, $disc = 0): array
    {
        $gst = gst($amount);
        $baseAmount = $amount - $gst['total'];
        $taxable = $amount;

        // if($disc>0){
        //     $baseAmount=$amount-$disc;
        //     $gst=gst($baseAmount,'inc');
        //     $taxable = $baseAmount - $gst['total'];
        // }

        return [$gst, $baseAmount, $taxable];
    }
}
