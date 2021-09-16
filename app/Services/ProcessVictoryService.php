<?php

namespace App\Services;

use App\Models\Trivia;
use App\Models\UserAnswer;

class ProcessVictoryService
{
    public function continueGame(): bool
    {
        return  !$this->win() && !$this->lost();
    }

    public function win(): bool
    {
        return count(UserAnswer::where('answer_user', 0)->get()) === 0;
    }

    public function lost(): bool
    {
        $lastAnswered = UserAnswer::where('answer_user', '!=', 0)
            ->orderBy('updated_at', 'DESC')
            ->first();
        if ($lastAnswered) {
            return $lastAnswered->answer_user !== $lastAnswered->answer_trivia;
        }
        return false;
    }

    public function correctAnswerCount(): int
    {
        return count(UserAnswer::where('answer_user', '!=', 0)->get()) - 1;
    }

    public function lastQuestionAnswered(): Trivia
    {
        $lastAnswered = UserAnswer::where('answer_user', '!=', 0)
            ->orderBy('updated_at', 'DESC')
            ->first();

        return Trivia::where('id', $lastAnswered->trivia_id)->firstOrfail();
    }
}
