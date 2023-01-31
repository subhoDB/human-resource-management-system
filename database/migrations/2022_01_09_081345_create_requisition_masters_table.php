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
            $table->enum('priority', config('hrms_db.requisition.priority'))->default('low');
            $table->dateTime('create_date')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->enum('status', config('hrms_db.requisition.status'))->default('open');
            $table->dateTime('closed_date')->nullable();
            $table->unsignedBigInteger('closed_by')->nullable();

            $table->integer('elapsed_time')->nullable();
            $table->integer('remaning_time')->nullable();

            $table->dateTime('reopen_date')->nullable();
            $table->integer('reopen_count')->nullable();
            $table->text('comments')->nullable();
            // $table->tinyInteger('is_delete')->default(0)->comment('0=>NotDelete,1=>Delete');
            $table->softDeletes();

            # Create forign keys
            $table->foreign("created_by")->references("id")->on("employee_masters")
                ->onUpdate('cascade');
            $table->foreign("closed_by")->references("id")->on("employee_masters")
                ->onUpdate('cascade');
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
