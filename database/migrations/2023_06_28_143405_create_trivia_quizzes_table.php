<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTriviaQuizzesTable extends Migration
{
    public function up()
    {
        Schema::create('trivia_quizzes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('question');
            $table->string('correct_answer');
            $table->string('option1');
            $table->string('option2');
            $table->string('option3');
            $table->string('option4');
            $table->string('watch_day');
            $table->string('price');
            // Add other relevant quiz columns
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('trivia_quizzes');
    }
}
