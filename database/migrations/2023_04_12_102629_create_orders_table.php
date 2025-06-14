<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('api_order_id')->nullable();
            $table->decimal('total_amount');
            $table->float('discount_amount')->nullable();
            $table->float('taxable_amount');
            $table->float('cgst_percent');
            $table->float('cgst');
            $table->float('sgst_percent');
            $table->float('sgst');
            $table->enum('status', ['initial', 'completed', 'failed']);
            $table->enum('mode', ['online', 'offline'])->nullable()->default('online');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
