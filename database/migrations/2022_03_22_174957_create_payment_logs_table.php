<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_logs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id')->default()->comment('ID Order');
            $table->integer('payment_method')->default(0)->comment('0: Chưa xác định, 1: Chuyển khoản, 2: Momo');
            $table->double('payment_money', 15, 2)->default(0)->comment('Tiền thanh toán');
            $table->string('content_for_payment', 255)->nullable()->comment('Nội dung cho chuyển khoản');
            $table->string('phone_for_payment', 255)->nullable()->comment('Số điện thoại chuyển');
            $table->string('account_for_payment', 255)->nullable()->comment('Số tài khoản chuyển');
            $table->string('transaction_id', 255)->nullable()->comment('Số tài khoản chuyển');
            $table->integer('status_payment')->default(0)->comment('1: Unpaid, 2: Partial payment, 3: Paid, 4: Refurn');
            $table->longText('payment_log')->nullable()->comment('Nội dung log của payment');
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
        Schema::dropIfExists('payment_logs');
    }
}
