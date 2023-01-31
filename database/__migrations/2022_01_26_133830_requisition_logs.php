<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RequisitionLogs extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
    **/
    public function up() {
        Schema::create('requisition_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('requisition_id')->constrained()->on('requisition_masters')->onDelete('cascade');

            $table->date('requisition_open_date')->nullable();
            $table->date('requisition_closed_date')->nullable();
            
            $table->integer('elapsed_time')->nullable();
            $table->integer('remaning_time')->nullable();
            
            $table->tinyInteger('requisition_status')->default(0)->comment('0=>Open,1=>Closed,2=>OnHold,4=>NotRequired,5=>ReOpen');
            $table->text('reopen_reason')->nullable()->comment('If requisition reopen then enter proper reason here.');
            // $table->text('requisition_note');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('requisition_logs');
    }
}
