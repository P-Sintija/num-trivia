<?php

namespace App\Services;

use App\Requests\Answer;
use App\Requests\AnswerCollection;

class GenerateAnswersService
{
    private AnswerCollection $answers;
    const ANSWER_MIN_DIFFERENCE = 1;
    const ANSWER_MAX_DIFFERENCE = 3;
    const ANSWER_COUNT = 3;

    public function __construct()
    {
        $this->answers = new AnswerCollection;
    }

    public function answers(Answer $answer): AnswerCollection
    {
        $this->answers->addAnswer($answer);
        while (count($this->answers->answers()) < self::ANSWER_COUNT) {
            $randomAnswer = new Answer($answer->answer() -
                rand(self::ANSWER_MIN_DIFFERENCE, self::ANSWER_MAX_DIFFERENCE));
            if ($randomAnswer->answer() > 0 && !in_array($randomAnswer, $this->answers->answers())) {
                $this->answers->addAnswer($randomAnswer);
            } else {
                $randomAnswer = new Answer($answer->answer() +
                    rand(self::ANSWER_MIN_DIFFERENCE, self::ANSWER_MAX_DIFFERENCE));
                if (!in_array($randomAnswer, $this->answers->answers())) {
                    $this->answers->addAnswer($randomAnswer);
                }
            }
        }
        return $this->answers;
    }
}
