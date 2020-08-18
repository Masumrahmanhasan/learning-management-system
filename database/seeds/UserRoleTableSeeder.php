<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		User::find(1)->assignRole(config('access.users.admin_role'));
        User::find(2)->assignRole('teacher');
        User::find(3)->assignRole('student');
        User::find(4)->assignRole(config('access.users.default_role'));
    }
}
