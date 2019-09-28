<?php

use Illuminate\Database\Seeder;
use App\Experience;

class ExperiencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Experience::truncate();
        $experiences = [
            [
                'user_id' => 1,
                'position' => 'senior Web developer',
                'company' => 'intelitec solutions',
                'content' => 'Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud solution. User generated content in real-time will have multiple touchpoints for offshoring.',
                'start_date' => '2019-01-11',
                'end_date' => null,
            ],
            [
                'user_id' => 1,
                'position' => 'Web developer',
                'company' => 'intelitec solutions',
                'content' => 'Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.',
                'start_date' => now(),
                'end_date' => now(),
            ],
            [
                'user_id' => 1,
                'position' => 'junior Web designer',
                'company' => 'shout! media productions',
                'content' => 'Podcasting operational change management inside of workflows to establish a framework. Taking seamless key performance indicators offline to maximise the long tail. Keeping your eye on the ball while performing a deep dive on the start-up mentality to derive convergence on cross-platform integration.',
                'start_date' => now(),
                'end_date' => now(),
            ],
            [
                'user_id' => 1,
                'position' => 'Web design intern',
                'company' => 'shout! media productions',
                'content' => 'Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI.',
                'start_date' => now(),
                'end_date' => now(),
            ],
        ];

        foreach ($experiences as $experience)
        {
            Experience::create([
                'user_id' => $experience['user_id'],
                'position' => $experience['position'],
                'company' => $experience['company'],
                'content' => $experience['content'],
                'start_date' => $experience['start_date'],
                'end_date' => $experience['end_date'],
            ]);
        }
    }
}
