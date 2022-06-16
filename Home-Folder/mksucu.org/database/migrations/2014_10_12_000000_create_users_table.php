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
          $table->string('mobile')->unique();
          $table->string('gender');
          $table->string('picture');
          $table->string('cover_image');
          $table->string('email')->unique();
          $table->string('bio');
          $table->string('address')->nullable();
          $table->string('reg_number')->nullable();
          $table->string('city')->nullable();
          $table->string('country')->nullable();
          $table->string('postal_code')->nullable();
          $table->string('verified')->default(User::UNVERIFIED_USER);
          $table->string('verification_token')->nullable();
          $table->timestamp('email_verified_at')->nullable();
          $table->string('password');
          $table->rememberToken();
          $table->timestamps();
          $table->softDeletes();
        });

        $admin = User::create([
           'firstname' => 'John',
           'lastname' => 'Mamicha',
           'mobile' => '0799115301',
           'email' => 'johnmamicha@gmail.com',
           'gender' => 'Male',
           'bio' => 'Disciplined Ethical Developer',
           'picture' => 'bg.jpg',
           'cover_image' => 'cu2.jpeg',
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
