<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHiringMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hiring_masters', function (Blueprint $table) {
            $table->id();
            
            $table->integer('candidate_id');
            $table->foreignId('requisition_id');
            $table->integer('position_id');

            $table->text('interviewers');
            $table->integer('scheduled_by');

            $table->date('interview_date');
            $table->time('interview_time', $precision = 0);
            $table->time('alternative_time', $precision = 0)->nullable();
            
            $table->text('interview_remarks')->nullable();
            $table->tinyInteger('interview_taken')->default(1)->comment('1=>Interview Not Done,0=>Interview Done');
            
            $table->integer('interview_round');
            $table->integer('interview_mode');
            $table->integer('created_by')->nullable();
            
            $table->tinyInteger('interview_status')->default(1)->comment('1=>New Scheduled,2=>Selected,3=>Rejected,4=>On Hold,5=>Resheduled,6=>Send approval to management,7=>Approved by management,8=>Rejected by management,9=>Offer letter sent,10=>Offer accept by candidate,11=>Offer rejected by candidate,12=>Joining scheduled,13=>Joining reshedule,14=>Not joined,15=>Joining Complete');
            
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
        Schema::dropIfExists('hiring_masters');
    }
}
