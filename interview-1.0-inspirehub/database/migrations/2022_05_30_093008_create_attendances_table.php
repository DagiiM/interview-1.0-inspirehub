<?php

use App\Models\Attendance;
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
        Schema::create('attendances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('description');
            $table->string('status')->default(Attendance::ATTENDANCE_OPEN);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('attendance_darasa', function (Blueprint $table) {
            $table->primary(['attendance_id','darasa_id']);
    
            $table->UnsignedBigInteger('attendance_id');
            $table->UnsignedBigInteger('darasa_id');
            $table->timestamps();
            $table->softDeletes();
    
            $table->foreign('attendance_id')
                  ->references('id')
                  ->on('attendances')
                  ->onDelete('cascade');
    
            $table->foreign('darasa_id')
                  ->references('id')
                  ->on('darasas')
                  ->onDelete('cascade');
        });
    
        Schema::create('attendance_user', function (Blueprint $table) {
          $table->primary(['attendance_id','user_id']);
    
          $table->UnsignedBigInteger('attendance_id');
          $table->UnsignedBigInteger('user_id');
          $table->timestamps();
          $table->softDeletes();
    
          $table->foreign('attendance_id')
                ->references('id')
                ->on('attendances')
                ->onDelete('cascade');
    
          $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('attendance_darasa');
        Schema::dropIfExists('attendance_user');
        Schema::dropIfExists('attendances');
    }
};
