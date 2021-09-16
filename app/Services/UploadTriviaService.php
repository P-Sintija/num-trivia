<?php

namespace App\Services;

use App\Repositories\TriviaApiRepository;
use App\Repositories\TriviaRepository;
use App\Models\UserAnswer;
use App\Models\Trivia;

class UploadTriviaService
{
    private TriviaRepository $triviaRepository;

    public function __construct()
    {
        $this->triviaRepository = new TriviaApiRepository;
    }

    public function storeTrivia(): void
    {
        $this->triviaRepository->store();

        $this->userAnswerTable();
    }

    private function userAnswerTable(): void
    {
        UserAnswer::truncate();
        $triviaNumbers = explode(',', $this->triviaRepository->triviaNumbers());

        foreach ($triviaNumbers as $triviaNumber) {
            $trivia = Trivia::where('answer', $triviaNumber)->firstOrFail();
            $userAnswer = new UserAnswer;
            $userAnswer->trivia_id = $trivia->id;
            $userAnswer->answer_trivia = $trivia->answer;
            $userAnswer->save();
        }
    }
}
