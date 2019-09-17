<?php

use Illuminate\Database\Seeder;
use App\Education;

class EducationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Education::truncate();

        $educations = [
            [
                'user_id' => 1,
                'study_at' => 'institute of technology of cambodia',
                'level' => 'college',
                'content' => 'computer science',
                'start_date' => now(),
                'end_date' => now()
            ],
            [
                'user_id' => 1,
                'study_at' => 'angkor high school',
                'level' => 'high school',
                'content' => 'general knowledge',
                'start_date' => now(),
                'end_date' => now()
            ],
            [
                'user_id' => 1,
                'study_at' => 'bonteay chas primary school',
                'level' => 'primary',
                'content' => 'general knowledge',
                'start_date' => now(),
                'end_date' => now()
            ],
        ];

        foreach ($educations as $education)
        {
            Education::create([
                'user_id' => $education['user_id'],
                'study_at' => $education['study_at'],
                'level' => $education['level'],
                'content' => $education['content'],
                'start_date' => $education['start_date'],
                'end_date' => $education['end_date'],
            ]);
        }
    }
}
