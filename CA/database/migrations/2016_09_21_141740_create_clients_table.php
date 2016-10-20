<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
           $table->increments('id');
            $table->string('name',50);
            $table->text('address');
            $table->string('contact_person',50)->nullable();
            $table->integer('mobile_number');
            $table->string('email_id',100)->unique();
            $table->string('status',50)->nullable();
            $table->string('PAN',10);
            $table->string('TAN',10);
            $table->string('TIN',9);
            $table->string('CIN',21);
            $table->string('excise_reg_no',15);
            $table->string('service_tax_reg_no',15);
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
        Schema::drop('clients');
    }
}
