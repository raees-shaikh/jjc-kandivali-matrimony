<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('pg_payment_id')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('pg_status')->nullable();
            $table->enum('status', ['initial', 'pending', 'completed', 'failed']);
            $table->dateTime('transaction_date')->useCurrent();
            $table->float('amount');
            $table->mediumText('pg_response')->nullable();
            $table->mediumText('payment_type')->nullable();
            $table->mediumText('pg_error_response')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
