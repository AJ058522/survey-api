<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CreateRolesSeeder::class);
        $this->call(CreateUsersSeeder::class);
        $this->call(CreateSurveysSeeder::class);
        $this->call(CreateSurveyQuestionsSeeder::class);
    }
}
