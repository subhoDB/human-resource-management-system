<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeLeaveMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_leave_masters', function (Blueprint $table) {
            $table->id();
            
            $table->integer('employee_id');
            // $table->foreign("employee_id")->references("id")->on("employee_masters")->onDelete('cascade');
            
            $table->float('privilege_leave', 1, 1);
            $table->float('casual_leave', 1, 1);
            $table->float('sick_leave', 1, 1);
            $table->float('comp_off', 1, 1);

            $table->timestamp("created_at")->useCurrent();
            $table->timestamp("updated_at")->useCurrent();
            $table->tinyInteger('is_active')->default(1)->comment('1=>Active, 0=>Inactive');
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_leave_masters');
    }
}
