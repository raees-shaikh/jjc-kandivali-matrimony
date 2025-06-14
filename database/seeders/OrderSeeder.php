<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        foreach ($users as $user) {
            for ($i = 1; $i < 4; $i++) {
                DB::table('orders')->insert([
                    'user_id' => $user->id,
                    'api_order_id' => 'ORD' . now()->format("dmyhis") . $i,
                    'total_amount' => 100,
                    'discount_amount' => 0,
                    'taxable_amount' => 100,
                    'cgst_percent' => 9,
                    'cgst' => 9,
                    'sgst_percent' => 9,
                    'sgst' => 9,
                    'status' => $i == 3 ? 'completed' : 'failed'
                ]);
            }
        }
    }
}
