<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeResignationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_resignation_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id');
            //->constrained()->on('employee_masters')->onDelete('cascade');
            
            $table->tinyInteger('resignation_status')->nullable()->comment('0=>No, 1=>Ask to leave, 2=> Left without inform, 3=> Yes/Provide Notice, 2=> Resignation Withdrol');
            $table->date('resignation_date')->nullable();
            $table->date('last_working_date')->nullable();
            $table->tinyInteger('notice_period')->default(0)->comment('0=>NoActivity,1=> 7 days, 2=> 15 days, 3=> 2=> 30 days, 4=> 60 days, 5=> Grater then 60 days');
            $table->char('notice_exact_days')->nullable()->comment('Exact days for employee notice');
            $table->text('resignation_mail')->nullable();
            $table->tinyInteger('is_approved')->default(0)->comment('0=>new request,1=>resignation approved,2=>resignation rejected,4=>resignation on hold');
            $table->tinyInteger('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_resignation_details');
    }
}
