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
        Schema::create('candidates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('phone_number')->unique();
            $table->string('full_name');
            $table->date('dob');
            $table->string('pob');
            $table->string('gender');
            $table->string('year_exp');
            $table->string('last_salary');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
