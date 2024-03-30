<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('country');
            $table->integer('activation_fees');
            $table->integer('welcome_bonus');
            $table->integer('withdrawal_min');
            $table->integer('withdrawal_fees');
            $table->integer('referral_bonus_1');
            $table->integer('referral_bonus_2');
            $table->integer('referral_bonus_3');
            $table->string('currency');
            $table->string('momo_number');
            $table->string('momo_names');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
