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
        Social::truncate();
        $user = User::find(1);

        $socials = [
            [
                'icon' => 'fab fa-github',
                'link' => 'https://github.com/ngouyuong',
            ],
            [
                'icon' => 'fab fa-facebook-f',
                'link' => 'https://www.facebook.com/uyoung.ngo?ref=bookmarks',
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
