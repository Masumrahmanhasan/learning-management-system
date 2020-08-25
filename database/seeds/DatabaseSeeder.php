<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(UserTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(UserRoleTableSeeder::class);
        $this->call(LocalSeeder::class);
        $this->call(ConfigSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(CourseSeeder::class);
        
        Artisan::call('fix:teacher-profile');

        Model::reguard();
    }
}
