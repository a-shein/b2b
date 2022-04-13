<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user1s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255)->nullable()->default(null);
            $table->smallInteger('gender')->nullable(false);
            $table->dateTime('birth_date')->nullable(false);
            $table->timestamps();
        });

        Schema::create('phone1s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('user1s');
            $table->string('phone', 11)->nullable(false);
            $table->unique(['user_id', 'phone']);
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
        Schema::dropIfExists('users1');
        Schema::dropIfExists('phones1');
    }
};
