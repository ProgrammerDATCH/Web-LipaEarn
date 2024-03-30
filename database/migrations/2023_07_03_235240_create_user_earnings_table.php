<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserEarningsTable extends Migration
{
    public function up()
    {
        Schema::create('user_earnings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->integer('total_earnings')->default(0);
            $table->integer('referral_earnings')->default(0);
            $table->integer('video_earnings')->default(0);
            $table->integer('boosting_earnings')->default(0);
            $table->integer('quiz_earnings')->default(0);
            $table->integer('bonus_earnings')->default(0);
            $table->integer('spin_earnings')->default(0);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_earnings');
    }
}
