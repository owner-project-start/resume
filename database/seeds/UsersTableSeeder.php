<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

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
        $users = [
            [
                'first_name' => 'ngo',
                'last_name' => 'uyuong',
                'street' => 211,
                'home_number' => '11DE0',
                'khan' => '7 makara',
                'songkat' => 'vealvong',
                'city' => 'phnom penh',
                'description' => 'I am experienced in leveraging agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition.',
                'email' => 'ngouyuong@gmail.com',
                'phone' => '77542245',
                'password' => 12345678,
                'status' => true
            ]
        ];

        foreach ($users as $user)
        {
            User::create([
                'first_name' => $user['first_name'],
                'last_name' => $user['last_name'],
                'home_number' => $user['home_number'],
                'street' => $user['street'],
                'khan' => $user['khan'],
                'songkat' => $user['songkat'],
                'city' => $user['city'],
                'description' => $user['description'],
                'phone' => $user['phone'],
                'email' => $user['email'],
                'status' => $user['status'],
                'password' => Hash::make($user['password']),
            ]);
        }
    }
}
