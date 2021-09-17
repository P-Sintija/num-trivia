<?php

namespace App\Entities;

use App\Models\Trivia;

class Question
{
    private string $question;

    public function __construct(Trivia $trivia)
    {
        $this->setQuestion($trivia);
    }

    public function question(): string
    {
        return $this->question;
    }

    public function setQuestion(Trivia $trivia): void
    {
        $questionToArray = explode(' ',  $trivia->question);
        array_shift($questionToArray);
        $this->question = implode(' ', $questionToArray);
    }
}
