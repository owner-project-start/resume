<?php

use App\User;
use App\Social;
use Illuminate\Database\Seeder;

class SocialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::find(1);

        $socials = [
            [
                'icon' => 'fab fa-github',
                'link' => '#',
            ],
            [
                'icon' => 'fab fa-facebook-f',
                'link' => '#',
            ]
        ];

        foreach ($socials as $social)
        {
            Social:: create(
                [
                    'user_id' => $user->id,
                    'icon' => $social['icon'],
                    'link' => $social['link'],
                ]
            );
        }
    }
}
