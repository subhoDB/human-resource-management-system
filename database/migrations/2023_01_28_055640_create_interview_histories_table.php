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
        Schema::create('interview_histories', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('interview_id')->index();

            $table->dateTime('interview_time')->index();
            $table->dateTime('alternative_time')->nullable();

            $table->unsignedBigInteger('interview_round')->index();
            $table->unsignedBigInteger('interview_mode')->index();

            $table->text('skillwise_points')->nullable();
            $table->text('overall_points')->nullable();

            $table->string('feedback_type')->nullable();
            $table->text('feedback')->nullable();
            
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamp("created_at")->useCurrent();

            $table->enum('activity_status', config('hrms_db.status.interview'))->default('scheduled')->nullable()->index();
            // $table->tinyInteger('activity_status')->default(1)->comment('1=>New Scheduled,2=>Selected,3=>Rejected,4=>On Hold,5=>Resheduled,6=>Send approval to management,7=>Approved by management,8=>Rejected by management,9=>Offer letter sent,10=>Offer accept by candidate,11=>Offer rejected by candidate,12=>Joining scheduled,13=>Joining reshedule,14=>Not joined,15=>Joining Complete');

            $table->foreign("interview_id")->references("id")->on("interviews")
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign("created_by")->references("id")->on("employee_masters")
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
        Schema::dropIfExists('interview_histories');
    }
};
