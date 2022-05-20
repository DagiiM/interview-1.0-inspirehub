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
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });

        $class1=Darasa::create([
            'name'=>'Chemistry Class', //edit and update
            'description'=>'This is the Chemistry Class',
          ]);
          $class2=Darasa::create([
            'name'=>'Geography Class', //edit and update
            'description'=>'Display Geography Class Resource',
          ]);
          $class3=Darasa::create([
            'name'=>'Mathematics Class', //edit and update
            'description'=>'This is Mathematics Class Resource',
          ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('darasas');
    }
};
