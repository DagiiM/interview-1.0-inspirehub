<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('firstname');
          $table->string('lastname');
          $table->string('email')->unique();
          $table->string('registration_number')->nullable();
          $table->string('verified')->default(User::UNVERIFIED_USER);
          $table->string('verification_token')->nullable();
          $table->timestamp('email_verified_at')->nullable();
          $table->string('password')->default('12345678');
          $table->rememberToken();
          $table->timestamps();
          $table->softDeletes();
        });

        $admin = User::create([
           'firstname' => 'John',
           'lastname' => 'Mamicha',
           'email' => 'johnmamicha@gmail.com',
           'gender' => 'Male',
           'password' => bcrypt('12345678')
         ]);

         $admin = User::create([
          'firstname' => 'Douglas',
          'lastname' => 'Mutethia',
          'mobile' => '0799115309',
          'email' => 'douglasmutethia2017@gmail.com',
          'gender' => 'Male',
          'bio' => 'Disciplined Ethical Developer',
          'picture' => '2.jpg',
          'cover_image' => 'cu2.jpeg',
          'password' => bcrypt('12345678')
        ]);

         $user = User::create([
          'firstname' => 'Normal',
          'lastname' => 'User',
          'mobile' => '0799115300',
          'email' => 'normal@example.gmail.com',
          'gender' => 'Female',
          'bio' => 'Disciplined Test Developer',
          'picture' => 'profile/default_female_image.jpg',
          'cover_image' => 'cu1.jpeg',
          'password' => bcrypt('12345678')
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}