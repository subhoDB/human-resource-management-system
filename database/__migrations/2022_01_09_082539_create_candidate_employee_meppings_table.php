<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidateEmployeeMeppingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_employee_meppings', function (Blueprint $table) {
            
            // $table->integer('employee_id');
            // $table->integer('candidate_id');

            
            $table->foreignId('employee_id')->constrained()->on('employee_masters')->onDelete('cascade');
            $table->foreignId('candidate_id')->constrained()->on('candidate_masters')->onDelete('cascade');
            
            $table->tinyInteger('emp_st')->default(1)->comment('1=>Active,0=>NotActive');
            
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
        Schema::dropIfExists('candidate_employee_meppings');
    }
}
