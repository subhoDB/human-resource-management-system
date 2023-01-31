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
            
            $table->bigInteger('phone_no')->nullable();
            $table->bigInteger('alternative_no')->nullable();
            $table->string('personal_email')->unique();
            $table->string('official_email')->unique();
            $table->text('present_address')->nullable();
            $table->text('skills')->nullable();
            $table->text('permanent_address')->nullable();
            $table->char('name_of_guardian', 120)->nullable();
            $table->char('emergency_phone_no', 120)->nullable();
            $table->char('father_name', 120)->nullable();
            $table->char('mother_name', 120)->nullable();

            $table->enum('gender', ['male', 'female', 'others'])->nullable();
            $table->enum('marital_status', ['single', 'married','divorce','separated'])->nullable();
            
            $table->char('pan_number', 20)->nullable();
            $table->char('aadhaar_number', 20)->nullable();
            $table->char('pf_number', 40)->nullable();
            $table->char('uan_number', 40)->nullable();
            $table->char('esic_number', 50)->nullable();
            $table->char('gross_salery', 25)->nullable();
            $table->tinyInteger('status')->default(1)->comment('0=>Former, 1=>Provession, 2=>Confirm, 3=>Resigned, 4=>Terminate');
            $table->date('resignation_date')->nullable();
            $table->date('last_date')->nullable();

            $table->timestamps();
            
            $table->foreign("user_id")->references("id")->on("users")
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
        Schema::dropIfExists('employee_masters');
    }
}
