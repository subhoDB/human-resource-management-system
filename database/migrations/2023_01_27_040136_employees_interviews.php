<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees_interviews', function (Blueprint $table) {

            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('interview_id');

            $table->foreign("employee_id")->references("id")->on("employee_masters")
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign("interview_id")->references("id")->on("interviews")
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
        //
    }
};
