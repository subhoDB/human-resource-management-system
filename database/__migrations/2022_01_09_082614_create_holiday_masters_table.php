<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHolidayMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('holiday_masters', function (Blueprint $table) {
            $table->id();
            $table->string('holiday_name');
            $table->date('holiday_date');
            $table->string('holiday_day');
            $table->tinyInteger('holiday_status')->default(1)->comment('1=>Active,0=>Inactive');
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
        Schema::dropIfExists('holiday_masters');
    }
}
