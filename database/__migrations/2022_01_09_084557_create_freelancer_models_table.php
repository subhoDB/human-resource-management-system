<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreelancerModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freelancer_models', function (Blueprint $table) {
            $table->id();
            
            $table->string('name');
            $table->string('email');
            $table->string('contact_no',14);
            $table->text('skills');
            $table->string('price');
            $table->text('comments');

            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();

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
        Schema::dropIfExists('freelancer_models');
    }
}
