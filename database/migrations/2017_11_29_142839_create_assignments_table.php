<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->charset = "utf8";
            $table->collation = "utf8_unicode_ci";

            $table->increments('id');
            $table->dateTime('date');
            $table->decimal('hours');
            $table->text('argumentation');

            $table->unsignedInteger('user_id');
            $table->unsignedInteger('company_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('company_id')->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assignments');
    }
}
