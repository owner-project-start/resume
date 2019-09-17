<?php

use Illuminate\Database\Seeder;
use App\Skill;

class SkillTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Skill::truncate();

        $skills = [
            [
                'user_id' => 1,
                'name' => 'HTML, CSS, Javascript, PHP, Python, Java, C, C++, C#',
                'active' => false,
            ],
            [
                'user_id' => 1,
                'name' => 'Laravel Framework',
                'active' => true,
            ],
            [
                'user_id' => 1,
                'name' => 'Vuejs, Nuxtjs',
                'active' => true,
            ],
            [
                'user_id' => 1,
                'name' => 'Cross Browser Testing & Debugging',
                'active' => false,
            ],
            [
                'user_id' => 1,
                'name' => 'Cross Functional Teams',
                'active' => false,
            ],
            [
                'user_id' => 1,
                'name' => 'Agile Development & Scrum',
                'active' => false,
            ]
        ];

        foreach ($skills as $skill)
        {
            Skill::create([
                'user_id' => $skill['user_id'],
                'name' => $skill['name'],
                'active' => $skill['active'],
            ]);
        }
    }
}
