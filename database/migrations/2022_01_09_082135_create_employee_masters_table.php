<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_masters', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->index();

            $table->char('name', 100);
            $table->string('image', 100)->nullable();
            $table->char('designation', 100);
            $table->string('employee_id', 20)->unique();
            $table->date('joining_date');
            $table->date('date_of_birth')->nullable();
            $table->date('confirmation_date')->nullable();

            $table->bigInteger('phone_no')->nullable()->index();
            $table->bigInteger('alternative_no')->nullable()->index();
            $table->string('personal_email')->unique()->index();
            $table->string('official_email')->unique()->index();
            $table->text('present_address')->nullable();

            // $table->unsignedBigInteger('skills_id')->nullable()->index();

            $table->text('permanent_address')->nullable();

            $table->char('name_of_guardian', 120)->nullable();
            $table->char('emergency_phone_no', 120)->nullable()->index();
            
            $table->char('father_name', 120)->nullable();
            $table->char('mother_name', 120)->nullable();

            $table->enum('gender', config('hrms_db.gender.type'))->nullable();
            $table->enum('marital_status', config('hrms_db.status.merital'))->nullable();
            
            $table->char('pan_number', 20)->nullable()->index();
            $table->char('aadhaar_number', 20)->nullable()->index();
            $table->char('pf_number', 40)->nullable();
            $table->char('uan_number', 40)->nullable();
            $table->char('esic_number', 50)->nullable();
            $table->char('gross_salery', 25)->nullable()->index();
            
            $table->enum('status', config('hrms_db.status.employee'))->default('provession')->nullable();

            // @todo Need to create a separate table for the status
            $table->date('resignation_date')->nullable();
            $table->date('last_date')->nullable();

            $table->timestamps();
            
            $table->foreign("user_id")->references("id")->on("users")
                ->onUpdate('cascade')
                ->onDelete('cascade');
            
            // $table->foreign("skills_id")->references("id")->on("skills_masters")
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_masters');
    }
}
