<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Ability;
use App\Models\Role;
use App\Models\Ebook;
use App\Models\Event;
use App\Models\Library;
use App\Models\Ministry;
use App\Models\Contact;
use App\Models\Social;
use App\Models\Video;
use App\Models\Gallary;
use App\Models\Theme;
use App\Models\Image;
use App\Models\Chat;
use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      DB::statement('SET FOREIGN_KEY_CHECKS=0');

       User::truncate();
       Ability::truncate();
       Role::truncate();
       Ebook::truncate();
       Event::truncate();
       Library::truncate();
       Ministry::truncate();
       Contact::truncate();
       Social::truncate();
       Theme::truncate();
       Video::truncate();
       Gallary::truncate();
       Image::truncate();
       Chat::truncate();
       Service::truncate();
       DB::table('ability_role')->truncate();
       DB::table('ministry_user')->truncate();
       DB::table('role_user')->truncate();

       $usersQuantity=100;
       $abilitiesQuantity=6;
       $rolesQuantity=5;
       $ebooksQuantity=10;
       $eventsQuantity=10;
       $librariesQuantity=10;
       $ministriesQuantity=10;
       $contactsQuantity=10;
       $socialsQuantity=5;
       $videosQuantity=100;
       $gallariesQuantity=50;
       $themesQuantity=50;
       $imagesQuantity=10;
       $chatsQuantity=50;
       $servicesQuantity=10;

      Ministry::factory($ministriesQuantity)->create();

      Ability::factory($abilitiesQuantity)->create();

      Role::factory($rolesQuantity)->create()->each(
        function($role){
          $abilities=Ability::all()->random(mt_rand(1,5))->pluck('id');
          $role->abilities()->attach($abilities);
        });
      User::factory($usersQuantity)->create()->each(
        function($user){
          $ministries=Ministry::all()->random(mt_rand(1,5))->pluck('id');
          $roles=Role::all()->random(mt_rand(1,5))->pluck('id');
          $user->ministries()->attach($ministries);
          $user->roles()->attach($roles);
        });

        Chat::factory($chatsQuantity)->create();


      Event::factory($eventsQuantity)->create();
      Library::factory($librariesQuantity)->create();
      Ebook::factory($ebooksQuantity)->create()->each(
        function($ebook){
          $library = Library::all()->random(mt_rand(1,5))->pluck('id');
          $ebook->library()->associate($library);
        });

      Contact::factory($contactsQuantity)->create();
      Social::factory($socialsQuantity)->create();
      Gallary::factory($gallariesQuantity)->create();

      Theme::factory($themesQuantity)->create();
      Image::factory($imagesQuantity)->create();
      Service::factory($servicesQuantity)->create();
     // Video::factory($videosQuantity)->create();

    }
}
