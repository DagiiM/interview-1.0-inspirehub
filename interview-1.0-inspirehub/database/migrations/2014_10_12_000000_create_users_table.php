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
          $table->string('designation')->default('member');
          $table->string('registration_number')->nullable();
          $table->string('verified')->default(User::UNVERIFIED_USER);
          $table->string('verification_token')->nullable();
          $table->timestamp('email_verified_at')->nullable();
          $table->string('password');
          $table->rememberToken();
          $table->timestamps();
          $table->softDeletes();
        });

        $admin = User::create([
           'firstname' => 'Admin',
           'lastname' => '1',
           'email' => 'admin@ssms.com',
           'gender' => 'Male',
           'password' => bcrypt('admin')
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
          'email' => 'normal@ssms.com',
          'gender' => 'Female',
          'bio' => 'Disciplined Test Developer',
          'picture' => 'profile/default_female_image.jpg',
          'cover_image' => 'cu1.jpeg',
          'password' => bcrypt('normal')
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