<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillsMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills_masters', function (Blueprint $table) {
            $table->id();
            $table->string('skill_name',90);
            $table->string('skill_slug',90);
            $table->boolean('is_active')->default(1)->comment('1=>Active,0=>Inactive');
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
        Schema::dropIfExists('skills_masters');
    }
}
