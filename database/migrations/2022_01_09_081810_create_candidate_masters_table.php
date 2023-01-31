<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidateMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_masters', function (Blueprint $table) {
            
            $table->id();

            $table->string('name',120);
            $table->string('phone_no',14)->unique()->index();
            $table->string('email_id',125)->unique()->index();
            
            $table->string('total_experience',50)->index();
            $table->string('relevant_experience',50);
            
            $table->enum('gender', ['male', 'female', 'others']);

            // $table->text('skills')->nullable();
            
            $table->string('present_salary',60)->comment('Present CTC');
            $table->string('expected_salary',60)->comment('Expected CTC');

            $table->string('notice_period',60);
            $table->string('comment');
            
            // $table->string('cv_path');
            
            $table->integer('created_by')->default(0);
            $table->integer('updated_by')->default(0);
            $table->integer('deleted_by')->default(0);

            # Create forign keys
            $table->foreign("created_by")->references("id")->on("employee_masters");
            $table->foreign("updated_by")->references("id")->on("employee_masters");
            $table->foreign("deleted_by")->references("id")->on("employee_masters");
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidate_masters');
    }
}
