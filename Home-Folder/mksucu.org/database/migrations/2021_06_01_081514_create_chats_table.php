<?php

use App\Models\Chat;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('sender_id');
          $table->unsignedBigInteger('ministry_id');
          $table->longText('message')->nullable();
          $table->string('status')->default(Chat::UNAVAILABLE_CHAT);
          $table->string('attachment')->nullable();
          $table->string('Expiration_date');
          $table->timestamps();
          $table->softDeletes();


          $table->foreign('sender_id')
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
        Schema::dropIfExists('chats');
    }
}
