<?php

use Illuminate\Database\Seeder;
use App\Certificate;

class CertificateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Certificate::truncate();
        $certificates = [
            [
                'name' => 'bachelor of computer science',
                'from' => 'institute of technology of cambodia',
                'link' => 'http://www.moeys.gov.kh/en/',
                'user_id' => 1,
            ],
            [
                'name' => 'certification of bascII',
                'from' => 'ministry of education',
                'link' => 'http://www.moeys.gov.kh/en/',
                'user_id' => 1,
            ],
            [
                'name' => 'certification of diploma',
                'from' => 'ministry of education',
                'link' => 'http://www.moeys.gov.kh/en/',
                'user_id' => 1,
            ]
        ];

        foreach ($certificates as $certificate)
        {
            Certificate::create([
                'name' => $certificate['name'],
                'from' => $certificate['from'],
                'link' => $certificate['link'],
                'user_id' => $certificate['user_id'],
            ]);
        }
    }
}
