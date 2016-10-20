<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignWorkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_work', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('client_id')
				  ->references('id')->on('client');
			$table->integer('employee_id')
				  ->references('id')->on('employees');
			$table->integer('work_id')
				  ->references('id')->on('work_master');
			$table->date('start_date');
			$table->date('end_date');
			$table->string('status');
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
        Schema::drop('assign_work');
    }
}
