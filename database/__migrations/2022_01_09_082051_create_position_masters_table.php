<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('position_masters', function (Blueprint $table) {
            
            $table->id();
            
            $table->string('position_name',90);
            $table->string('position_slug',90);
            $table->tinyInteger('is_active')->default(1)->comment('1=>Active,0=>Inactive');

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
        Schema::dropIfExists('position_masters');
    }
}
