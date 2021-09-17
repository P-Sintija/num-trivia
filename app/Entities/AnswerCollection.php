<?php

namespace App\Entities;

class AnswerCollection
{
    private array $answers;

    public function addAnswer(Answer $answer): void
    {
        $this->answers[] = $answer;
    }

    public function answers(): array
    {
        return $this->answers;
    }
}
