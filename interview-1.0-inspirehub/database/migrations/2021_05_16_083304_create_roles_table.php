<?php

use App\Models\User;
use App\Models\Role;
use App\Models\Ability;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('description')->unique();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('abilities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('description')->unique();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('ability_role', function (Blueprint $table) {
            $table->primary(['role_id','ability_id']);

            $table->UnsignedBigInteger('role_id');
            $table->UnsignedBigInteger('ability_id');
            $table->timestamps();

            $table->foreign('role_id')
                  ->references('id')
                  ->on('roles')
                  ->onDelete('cascade');

            $table->foreign('ability_id')
                  ->references('id')
                  ->on('abilities')
                  ->onDelete('cascade');

        });

        Schema::create('role_user', function (Blueprint $table) {
            $table->primary(['user_id','role_id']);

            $table->UnsignedBigInteger('user_id');
            $table->UnsignedBigInteger('role_id');
            $table->timestamps();
            $table->softDeletes();


            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->foreign('role_id')
                  ->references('id')
                  ->on('roles')
                  ->onDelete('cascade');
        });

        $ability1=Ability::create([
          'name'=>'ability-list', //index and show
          'description'=>'Allows Listing of The Resource',
        ]);

        $ability2=Ability::create([
          'name'=>'ability-create', //create and store
          'description'=>'Display Creation form of a Resource',
        ]);

        $ability3=Ability::create([
          'name'=>'ability-edit', //edit and update
          'description'=>'Display Edit form of a Resource',
        ]);

        $ability4=Ability::create([
          'name'=>'ability-delete', //destroy
          'description'=>'Display Delete Buttons and Allow Deletion of a Resource from Database',
        ]);

        $ability7=Ability::create([
          'name'=>'ability-restore', //restore
          'description'=>'Restore Deleted Resource from Database',
        ]);

        $ability5=Ability::create([
          'name'=>'ability-edit-user', //edit-user profile
          'description'=>'Allow One User to edit Other User Profile',
        ]);

        $ability6=Ability::create([
          'name'=>'executive-user', //edit-user profile
          'description'=>'Enable Display of Executive Members.',
        ]);

        $admin=Role::create([
          'name'=>'Super User Role', //Super Human
          'description'=>'Has all the abilities to Control the resources.',
        ]);

        $admin->abilities()->attach([$ability1->id,$ability2->id,$ability3->id,$ability4->id,$ability5->id,$ability6->id,$ability7->id]);

        $admin1=User::find(1);

        $admin2=User::find(2);

        $admin1->roles()->attach($admin);

        $admin2->roles()->attach($admin);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('role_user');
      Schema::dropIfExists('ability_role');
      Schema::dropIfExists('roles');
      Schema::dropIfExists('abilities');
    }
}
