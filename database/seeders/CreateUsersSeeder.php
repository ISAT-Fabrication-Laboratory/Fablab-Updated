<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin',
                'birthdate' => '18/08/17',
                'organization' => 'test',
                'occupation' => 'test',
                'street' => 'test',
                'municipality' => 'test',
                'municipality' => 'test',
                'province' => 'test',
                'contact_number' => '09091480447',
                'province' => 'test',
                'email' => 'admin@gmail.com',
                'type' => 1,
                'password' => bcrypt('12345678'),
                'picture' => 'images/fablab.png',
            ],
            [
                'name' => 'User',
                'birthdate' => '18/08/17',
                'organization' => 'test',
                'occupation' => 'test',
                'street' => 'test',
                'municipality' => 'test',
                'municipality' => 'test',
                'province' => 'test',
                'contact_number' => '09091480448',
                'province' => 'test',
                'email' => 'user@gmail.com',
                'type' => 0,
                'password' => bcrypt('12345678'),
                'picture' => 'images/linus.jpg',
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
//php artisan db:seed --class=CreateUsersSeeder
