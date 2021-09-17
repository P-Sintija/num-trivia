<?php

namespace App\Services;

use App\Models\Trivia;
use App\Models\UserAnswer;
use App\Entities\Answer;
use App\Entities\AnswerCollection;
use App\Services\GenerateAnswersService;

class TriviaService
{
    private GenerateAnswersService $generateAnswersService;

    public function __construct(GenerateAnswersService $generateAnswersService)
    {
        $this->generateAnswersService = $generateAnswersService;
    }

    public function firstUnasnweredQuestion(): UserAnswer
    {
        return UserAnswer::where('answer_user', 0)->firstOrFail();
    }

    public function question(UserAnswer $userAnswer): Trivia
    {
        return Trivia::find($userAnswer->trivia_id);
    }

    public function answers(UserAnswer $userAnswer): AnswerCollection
    {
       return $this->generateAnswersService->answers(new Answer($userAnswer->answer_trivia));
    }
}
