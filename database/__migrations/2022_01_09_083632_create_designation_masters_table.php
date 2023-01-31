<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignationMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designation_masters', function (Blueprint $table) {
            $table->id();
            $table->string('designation_name', 80);
            $table->string('designation_slug', 85);
            $table->tinyInteger('is_delete')->default(1)->comment('1=>No,0=>Yes');
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
        Schema::dropIfExists('designation_masters');
    }
}
