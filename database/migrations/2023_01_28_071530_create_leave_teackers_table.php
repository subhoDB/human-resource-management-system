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
        Schema::create('leave_teackers', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('employee_id')->index();
            $table->string('application_id',30);
            
            $table->enum('leave_type',config('hrms_db.leave.type'))->nullable();
            $table->float('applied_for', 1, 1);

            $table->date("start_date")->index();
            $table->date("end_date")->index();

            $table->longText("leave_reason");

            $table->unsignedBigInteger('reporting_manager')->index();
            $table->dateTime('manager_approval')->nullable();
            $table->longText('manager_comment')->nullable();

            $table->unsignedBigInteger('hr_manager')->index();
            $table->dateTime('hr_approval')->nullable();
            $table->text('hr_comment')->nullable();

            $table->timestamp("created_at")->useCurrent();
            $table->softDeletes();

            $table->foreign('employee_id')->references('id')->on('employee_masters')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('reporting_manager')->references('id')->on('employee_masters')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            
            $table->foreign('hr_manager')->references('id')->on('employee_masters')
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
        Schema::dropIfExists('leave_teackers');
    }
};
