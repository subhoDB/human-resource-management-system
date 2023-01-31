<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeAttendanceMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_attendance_masters', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->date('attendance_date');
            
            $table->integer('is_ellc')->default(0)->comment('0=>No EL & LC, 1=>EL, 2=>LC, 3=> EL & LC Booth');

            $table->integer('leave_type')->default(0)->comment('0=>N/A, 1=> PL, 2=> Casual Leave, 3=> Sick Leave, 4=> Comp Off, 5=> Uninform Leave, 6=> Leave Without Pay(LWP), 7=> Holiday, 8=> Week Off(WO)');
            $table->string('day_avalibulity',10)->default('P')->comment('P=> present, L=>Leave, H=>Half Day');
            
            $table->integer('assigned_tasks')->nullable();
            $table->integer('closed_tasks')->nullable();
            $table->integer('total_time_logged')->nullable();

            $table->integer('entry_time')->nullable();
            $table->integer('exit_time')->nullable();

            $table->integer('late_counts')->nullable();
            $table->integer('total_office_time')->nullable();

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
        Schema::dropIfExists('employee_attendance_masters');
    }
}
