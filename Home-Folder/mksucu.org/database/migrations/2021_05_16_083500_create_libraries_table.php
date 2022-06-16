<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libraries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('description')->unique();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('ebooks', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->UnsignedBigInteger('library_id');
          $table->string('subject')->unique();
          $table->string('url')->unique();
          $table->timestamps();
          $table->softDeletes();

          $table->foreign('library_id')
                ->references('id')
                ->on('libraries')
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
        Schema::dropIfExists('ebooks');
        Schema::dropIfExists('libraries'); 
    }
}
