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
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->integer('payment')->nullable()->comment('0:momo, 1:bank');
            $table->integer('is_business')->default(0);
            $table->string('company_name')->nullable();
            $table->string('company_address')->nullable();
            $table->string('company_mail')->nullable();
            $table->string('company_mst')->nullable();
            $table->bigInteger('total')->default(0);
            $table->integer('is_paid')->default(0)->comment("0:new , 1:payment done, 2: payment error");
            $table->double('payment_money', 15, 2)->default(0)->comment('Tiền thanh toán');
            $table->string('content_for_payment', 255)->nullable()->comment('Nội dung cho chuyển khoản');
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
        Schema::dropIfExists('orders');
    }
}
