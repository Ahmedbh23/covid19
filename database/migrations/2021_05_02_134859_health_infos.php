<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HealthInfos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_infos', function (Blueprint $table) {
            $table->id();
            $table->string('diseases');
            $table->integer('nbr_diseases');
            $table->integer('age');
            
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
            
            $table->unsignedBigInteger('state_id');
            $table->foreign('state_id')
                    ->references('id')->on('states')
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
        Schema::dropIfExists('health_infos');
    }
}
