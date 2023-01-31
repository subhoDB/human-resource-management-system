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
        Schema::create('interviews', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('candidate_id');
            $table->unsignedBigInteger('requisition_id');
            $table->unsignedBigInteger('position_id');

            // $table->text('interviewers');

            $table->unsignedBigInteger('scheduled_by');

            // $table->date('interview_date');
            // $table->time('interview_time', $precision = 0);
            // $table->time('alternative_time', $precision = 0)->nullable();
            
            $table->dateTime('interview_time');
            $table->dateTime('alternative_time');
            $table->text('interview_feedback')->nullable();

            // $table->tinyInteger('interview_taken')->default(1)->comment('1=>Interview Not Done,0=>Interview Done');

            $table->unsignedBigInteger('interview_round')->index();
            $table->unsignedBigInteger('interview_mode')->index();

            $table->unsignedBigInteger('created_by')->nullable();

            $table->enum('interview_status', config('hrms_db.status.interview'))->default('scheduled')->nullable();
            
            $table->timestamps();
            
            # Create foreign keys
            $table->foreign("scheduled_by")->references("id")->on("employee_masters")
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign("candidate_id")->references("id")->on("candidate_masters")
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign("requisition_id")->references("id")->on("requisition_masters")
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign("position_id")->references("id")->on("position_masters")
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign("interview_round")->references("id")->on("interview_rounds")
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign("interview_mode")->references("id")->on("interview_modes")
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
        Schema::dropIfExists('interviews');
    }
};
