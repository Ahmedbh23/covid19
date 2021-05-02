<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->integer('prix');
            $table->dateTime('tested_at', $precision = 0);
            $table->string('test_result');

            $table->foreignId('User_id')->constrained();
            
            $table->unsignedBigInteger('lab_id');
            $table->foreign('lab_id')
                    ->references('id')->on('Laboratories')
                    ->onDelete('cascade');

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
        Schema::dropIfExists('tests');
    }
}
