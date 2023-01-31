<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configurations', function (Blueprint $table) {
            $table->id();
            
            $table->string('configuration_name');
            $table->string('configuration_key');
            $table->text('configuration_value');

            $table->tinyInteger('configuration_status')->default(1)->comment('1=>Active,0=>Inactive');
            $table->tinyInteger('is_deleted')->default(1)->comment('1=>No,0=>Yes');

            $table->integer('created_by');

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
        Schema::dropIfExists('configurations');
    }
}
