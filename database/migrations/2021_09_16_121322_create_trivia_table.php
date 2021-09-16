<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTriviaTable extends Migration
{
    public function up(): void
    {
        Schema::create('trivia', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->integer('answer');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trivia');
    }
}
