<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('number')->unique();
            $table->string('password');
            $table->string('profile');
            $table->string('country')->nullable();
            $table->unsignedBigInteger('referral_id')->nullable();
            $table->foreign('referral_id')->references('id')->on('users');
            $table->decimal('referrals', 8, 2)->default('0');
            $table->string('status')->default('Pending');
            $table->timestamps();
            $table->string('role')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
