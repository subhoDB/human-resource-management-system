<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_details', function (Blueprint $table) {
            $table->unsignedBigInteger('subscription_id')->index();
            
            $table->string('desctiption');
            $table->string('short_desctiption')->nullable();
            $table->text('features');
                                    
            $table->foreign("subscription_id")->references("id")->on("subscription_plans")
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
        Schema::dropIfExists('subscription_details');
    }
}
