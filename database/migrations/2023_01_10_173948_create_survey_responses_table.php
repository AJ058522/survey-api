<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_responses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('survey_question_id')->references('id')->on('survey_questions');
            $table->foreign('survey_question_id')->references('id')->on('survey_questions');
            $table->unsignedBigInteger('user_id')->references('id')->on('users');
            $table->foreign('user_id')->references('id')->on('users');
            $table->tinyInteger('vote')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_responses');
    }
};
