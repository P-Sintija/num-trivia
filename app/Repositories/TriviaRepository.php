<?php

namespace App\Repositories;

interface TriviaRepository
{
    public function store(): void;

    public function triviaNumbers(): string;
}
