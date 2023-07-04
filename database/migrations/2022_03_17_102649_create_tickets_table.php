<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->integer('type')->default(0)->comment('0:online, 1:offline');
            $table->text('image')->nullable();
            $table->text('name')->nullable();
            $table->date('date')->nullable();
            $table->time('from')->nullable();
            $table->time('to')->nullable();
            $table->integer('quantity')->nullable();
            $table->text('address')->nullable();
            $table->bigInteger('price')->default(0);
            $table->text('link_video')->nullable();
            $table->string('examiner_type')->nullable();
            $table->text('examiner')->nullable();
            $table->text('overview')->nullable();
            $table->integer('is_active')->default(1);
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
        Schema::dropIfExists('tickets');
    }
}
