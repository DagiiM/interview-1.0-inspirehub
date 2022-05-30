<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Darasa;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('darasas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description');
            $table->string('status')->default(Darasa::DARASA_OPEN);
            $table->timestamps();
        });

        Schema::create('darasa_user', function (Blueprint $table) {
          $table->primary(['user_id','darasa_id']);

          $table->UnsignedBigInteger('user_id');
          $table->UnsignedBigInteger('darasa_id');
          $table->timestamps();
          $table->softDeletes();

          $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

          $table->foreign('darasa_id')
                ->references('id')
                ->on('darasas')
                ->onDelete('cascade');
      });

      
        $class1=Darasa::create([
            'name'=>'Chemistry Class', //edit and update
            'description'=>'This is the Chemistry Class',
            'status'=>Darasa::DARASA_OPEN,
          ]);
          $class2=Darasa::create([
            'name'=>'Geography Class', //edit and update
            'description'=>'Display Geography Class Resource',
            'status'=>Darasa::DARASA_CLOSED,
          ]);
          $class3=Darasa::create([
            'name'=>'Mathematics Class', //edit and update
            'description'=>'This is Mathematics Class Resource',
            'status'=>Darasa::DARASA_OPEN,
          ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('darasa_user');
        Schema::dropIfExists('darasas');
    }
};
