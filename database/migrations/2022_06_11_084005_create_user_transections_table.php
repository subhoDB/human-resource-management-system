<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTransectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_transections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            
            $table->integer('transection_id');
            $table->integer('payment_id');
            $table->integer('subscription_id');
            
            $table->date('start_date');
            $table->date('end_date');
            
            $table->enum('status', ['active', 'expire'])->default('active');
            
            $table->foreign("user_id")->references("id")->on("users")
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_transections');
    }
}
