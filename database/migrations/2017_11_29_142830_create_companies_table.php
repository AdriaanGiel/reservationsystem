<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->charset = "utf8";
            $table->collation = "utf8_unicode_ci";

            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('street');
            $table->integer('number');
            $table->string('insertion')->nullable();
            $table->string('zipcode');
            $table->string('city');
            $table->text('argumentation')->nullable();
            $table->unsignedInteger('status_id');
            $table->unsignedInteger('company_status_id');
            $table->timestamps();

            $table->foreign('status_id')->references('id')->on('statuses');
            $table->foreign('company_status_id')->references('id')->on('statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
