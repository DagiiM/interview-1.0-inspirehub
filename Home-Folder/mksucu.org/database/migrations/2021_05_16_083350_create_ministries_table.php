<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMinistriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ministries', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('name')->unique();
          $table->string('description')->unique();
          $table->string('image')->unique();
          $table->timestamps();
          $table->softDeletes();
        });

        Schema::create('ministry_user', function (Blueprint $table) {
            $table->primary(['user_id','ministry_id']);

            $table->UnsignedBigInteger('user_id');
            $table->UnsignedBigInteger('ministry_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->foreign('ministry_id')
                  ->references('id')
                  ->on('ministries')
                  ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ministry_user');
        Schema::dropIfExists('ministries');
    }
}
