<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $adminRole = Role::where('name', 'Admin')->first();
        $moderatorRole = Role::where('name', 'Moderator')->first();
        $userRole = Role::where('name', 'User')->first();

        $admin = User::create([
            'name' => 'Admin',
            'gender' => 'Male',
            'mobile' => '01681941159',
            'email' => 'admin@brfbd.com',
            'address' => 'Shankar, Dhanmondi',
            'password' => bcrypt('admin')
        ]);

        $moderator = User::create([
            'name' => 'Moderator',
            'gender' => 'Male',
            'mobile' => '01681941159',
            'email' => 'moderator@brfbd.com',
            'address' => 'Shankar, Dhanmondi',
            'password' => bcrypt('moderator')
        ]);

        $user = User::create([
            'name' => 'User',
            'gender' => 'Male',
            'mobile' => '01681941159',
            'email' => 'user@brfbd.com',
            'address' => 'Shankar, Dhanmondi',
            'password' => bcrypt('user')
        ]);

        $admin->roles()->attach($adminRole);
        $moderator->roles()->attach($moderatorRole);
        $user->roles()->attach($userRole);
    }
}
