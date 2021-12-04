<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrolmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrolments', function (Blueprint $table) {
            $table->string('id');
            $table->string('stid');
            $table->string('mid');
            $table->string('lid');
            $table->foreign('stid')->references('stid')->on('students')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('mid')->references('mid')->on('modules')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('lid')->references('lid')->on('lecturers')->onDelete('cascade')->onUpdate('cascade');
            $table->primary(['stid', 'mid', 'block']);
            $table->string('block');
            $table->string('mark');
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
        Schema::dropIfExists('enrolments');
    }
}
