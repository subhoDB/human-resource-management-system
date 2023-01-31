<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeLeaveDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_leave_details', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('employee_id')->index();
            // $table->foreign("employee_id")->references("id")->on("employee_masters")->onDelete('cascade');
            $table->integer('application_id');
            
            $table->integer('leave_type')->default(0)->comment('0=>N/A, 1=> Privilege Leave, 2=> Casual Leave, 3=> Sick Leave, 4=> Comp Off, 5=> Uninform Leave, 6=> Leave Without Pay(LWP), 7=> Holiday, 8=> Week Off(WO)');
            $table->float('leave_applied_for', 1, 1)->comment('0.5=>Half Day, 1=> Full Day');
            $table->date("leave_date");
            $table->text("leave_reason");

            $table->integer('reporting_manager');
            $table->tinyInteger('manager_approval')->default(0)->comment('1=>Approved, 2=> Rejected, 0=>Not Approved/Pending');

            $table->integer('approved_by')->nullable();
            $table->date('approved_date')->nullable();
            $table->text('approval_comment')->nullable();

            // $table->float('sick_leave', 1, 1);
            // $table->float('comp_off', 1, 1);
            
            $table->timestamp("created_at")->useCurrent();
            $table->timestamp("updated_at")->useCurrent();
            $table->tinyInteger('is_delete')->default(1)->comment('1=>Not Delete, 0=>Delete');

            $table->foreign('employee_id')->references('id')->on('employee_masters')
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
        Schema::dropIfExists('employee_leave_details');
    }
}
