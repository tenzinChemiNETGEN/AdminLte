<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Admin',
                'email' => 'Admin@test.com',
                'roll_id' => '1',
                'password' => bcrypt('admin123456'),
            ],
            [
                'name' => 'Editor',
                'email' => 'Editor@test.com',
                'roll_id' => '2',
                'password' => bcrypt('Editor123456'),
            ],
            [
                'name' => 'user',
                'email' => 'user@test.com',
                'roll_id' => '3',
                'password' => bcrypt('user123456'),
            ]
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
