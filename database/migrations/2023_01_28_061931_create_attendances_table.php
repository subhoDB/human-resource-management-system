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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('employee_id')->index();
            $table->date('attendance_date');
            
            $table->integer('total_time_logged')->nullable()->comment('Every month log');
            
            $table->dateTime('entry_time')->nullable();
            $table->dateTime('exit_time')->nullable();
            
            $table->integer('late_counts')->default(0)->nullable();
            $table->integer('total_office_time')->nullable();
            
            $table->enum('attendance_status',config('hrms_db.status.attendance'))->default('present');
            
            $table->timestamps();

            $table->foreign("employee_id")->references("id")->on("employee_masters")
                ->onUpdate('cascade')
                ->onDelete('cascade');

            // $table->integer('leave_type')->default(0)->comment('0=>N/A, 1=> PL, 2=> Casual Leave, 3=> Sick Leave, 4=> Comp Off, 5=> Uninform Leave, 6=> Leave Without Pay(LWP), 7=> Holiday, 8=> Week Off(WO)');
            // $table->string('day_avalibulity',10)->default('P')->comment('P=> present, L=>Leave, H=>Half Day');
            // $table->integer('assigned_tasks')->nullable();
            // $table->integer('closed_tasks')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendances');
    }
};
