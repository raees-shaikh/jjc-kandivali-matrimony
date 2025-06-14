<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = Order::where('status', 'completed')->get();
        foreach ($orders as $order) {
            for ($i = 1; $i < 4; $i++) {
                DB::table('subscriptions')->insert([
                    'user_id' => $order->user_id,
                    'order_id' => $order->id,
                    'start_date' => Carbon::now(),
                    'end_date' => Carbon::now()->addMonth(),
                    'is_active' => $i == 3 ? 1 : 0,
                ]);
            }
        }
    }
}
