<?php

namespace App\Entities;

class Answer
{
    private int $answer;
    private ?int $userAnswerId;

    public function __construct(int $answer, ?int $userAnswerId = null)
    {
        $this->answer = $answer;
        $this->userAnswerId = $userAnswerId;
    }

    public function answer(): int
    {
        return $this->answer;
    }

    public function answerId(): ?int
    {
        return $this->userAnswerId;
    }
}
