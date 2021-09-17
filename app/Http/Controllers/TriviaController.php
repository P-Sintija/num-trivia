<?php

namespace App\Http\Controllers;

use App\Entities\Question;
use App\Services\TriviaService;
use App\Services\ProcessVictoryService;
use Illuminate\Contracts\View\View;

class TriviaController extends Controller
{
    private TriviaService $triviaService;
    private ProcessVictoryService $processVictoryService;

    public function __construct(
        TriviaService $triviaService,
        ProcessVictoryService $processVictoryService
    ) {
        $this->triviaService = $triviaService;
        $this->processVictoryService = $processVictoryService;
    }

    public function index(): View
    {
        if (!$this->processVictoryService->continueGame()) {
            if ($this->processVictoryService->lost()) {
                $correctAnsweredCount = $this->processVictoryService->correctAnswerCount();
                $lastQuestion = $this->processVictoryService->lastQuestionAnswered();

                return view('victory', [
                    'correctAnsweredCount' => $correctAnsweredCount,
                    'lastQuestion' => (new Question($lastQuestion))->question(),
                    'lastCorrectAnsver' => $lastQuestion->answer
                ]);
            } else {

                return view('victory');
            }
        }

        $userAnswer = $this->triviaService->firstUnasnweredQuestion();
        $question = $this->triviaService->question($userAnswer);
        $answers = $this->triviaService->answers($userAnswer)->answers();
        shuffle($answers);

        return view('trivia', [
            'id' => $userAnswer->id,
            'question' => (new Question($question))->question(),
            'answers' => $answers
        ]);
    }
}
