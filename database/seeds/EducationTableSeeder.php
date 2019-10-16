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
                'degree' => 'college',
                'description' => 'computer science',
                'from' => now(),
                'to' => now()
            ],
            [
                'user_id' => 1,
                'study_at' => 'angkor high school',
                'degree' => 'high school',
                'description' => 'general knowledge',
                'from' => now(),
                'to' => now()
            ],
            [
                'user_id' => 1,
                'study_at' => 'bonteay chas primary school',
                'degree' => 'primary',
                'description' => 'general knowledge',
                'from' => now(),
                'to' => now()
            ],
        ];

        foreach ($educations as $education)
        {
            Education::create([
                'user_id' => $education['user_id'],
                'study_at' => $education['study_at'],
                'degree' => $education['degree'],
                'description' => $education['description'],
                'from' => $education['from'],
                'to' => $education['to'],
            ]);
        }
    }
}
