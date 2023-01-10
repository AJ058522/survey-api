<?php

namespace Database\Seeders;

use App\Models\SurveyQuestion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateSurveyQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            SurveyQuestion::create([
                'survey_id' => 1,
                'question' => 'Question example ' . $i + 1
            ]);
        }
    }
}
