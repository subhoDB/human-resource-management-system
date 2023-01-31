<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequisitionMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisition_masters', function (Blueprint $table) {
            $table->id();
            $table->string('requisition_id')->unique();
            $table->string('position');
            $table->string('experiance');
            $table->string('replacement');
            $table->text('job_description');
            $table->tinyInteger('priority')->default(1)->comment('1=>Low,2=>Medium,3=>High');
            $table->date('requisition_create_date')->nullable();
            $table->tinyInteger('created_by')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0=>Open,1=>Closed,2=>OnHold,4=>NotRequired,5=>ReOpen');
            $table->date('requisition_closed_date')->nullable();
            $table->tinyInteger('closed_by')->nullable();
            $table->integer('elapsed_time')->nullable();
            $table->integer('remaning_time')->nullable();
            $table->date('requisition_reopen_date')->nullable();
            $table->tinyInteger('reopen_count')->nullable();
            // $table->string('reopen_reason')->nullable();
            $table->text('comments');
            $table->tinyInteger('is_delete')->default(0)->comment('0=>NotDelete,1=>Delete');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requisition_masters');
    }
}
