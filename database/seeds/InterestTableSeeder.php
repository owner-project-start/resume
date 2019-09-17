<?php

use Illuminate\Database\Seeder;
use App\Interest;

class InterestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Interest::truncate();

        $interests = [
            [
                'user_id' => 1,
                'description' => 'Apart from being a web developer, I enjoy most of my time being outdoors. In the winter, I am an avid skier and novice ice climber. During the warmer months here in Colorado, I enjoy mountain biking, free climbing, and kayaking.'
            ],
            [
                'user_id' => 1,
                'description' => 'When forced indoors, I follow a number of sci-fi and fantasy genre movies and television shows, I am an aspiring chef, and I spend a large amount of my free time exploring the latest technology advancements in the front-end web development world.'
            ],
        ];

        foreach ($interests as $interest)
        {
            Interest::create([
                'user_id' => $interest['user_id'],
                'description' => $interest['description']
            ]);
        }
    }
}
