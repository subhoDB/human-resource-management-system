<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            
            $table->string('name');
            $table->string('email')->unique();

            $table->timestamp('email_verified_at')->nullable();
            $table->integer('wrong_attempt')->nullable();
            // $table->tinyInteger('is_login_active')->default(1)->comment('1=>Active,0=>NotActive');
            
            $table->string('password');
            
            // $table->integer('package_id')->nullable();
            $table->string('company_name')->nullable();

            $table->boolean('status')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('users');
    }
}
