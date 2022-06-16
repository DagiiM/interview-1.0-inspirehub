<?php

use App\Models\System;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('systems', function (Blueprint $table) {
            $table->id();
            $table->string('application_name')->unique();
            $table->string('email')->unique();
            $table->string('vision')->unique();
            $table->string('mission')->unique();
            $table->string('values')->unique();
            $table->string('description')->unique();
            $table->string('system_key')->unique();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('mobile')->unique();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('socials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('url')->unique();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('themes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('semester')->unique();
            $table->string('subject')->unique();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('subject')->unique();
            $table->string('image');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('subject')->unique();
            $table->string('time');
            $table->timestamps();
            $table->softDeletes();
        });

        //Machakos University system
        System::create([
          'application_name'=>'MACHAKOS UNIVERSITY CHRISTIAN UNION',
          'email'=>'christianunionmu@gmail.com',
          'vision'=>'Students fully equipped for every good work in God’s service to impact society in and out of the campus.',
          'mission'=>'To fellowship, evangelize and equip students with knowledge of the word of God for effective Christian living in and out of the campus.',
          'values'=>'• Commitment • Integrity • Faithfulness to the Holy Scripture • Teamwork • Excellence • Student-centred',
          'description'=>'The CU is a member of the Fellowship of Christian Unions (FOCUS)',
          'system_key'=>config('app.name'),
        ]);
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('systems');
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('socials');
        Schema::dropIfExists('themes');
        Schema::dropIfExists('images');
        Schema::dropIfExists('services');
    }
}
