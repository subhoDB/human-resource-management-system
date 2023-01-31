<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmployeeCandidateMapping extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_candidate_mappings', function (Blueprint $table) {
            $table->foreignId('candidate_id')->references('id')->on('candidate_masters');
            $table->foreignId('employee_id')->constrained()->on('employee_masters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_candidate_mappings');
    }
}
