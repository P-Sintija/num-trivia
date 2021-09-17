<?php

namespace App\Repositories;

use App\Models\Trivia;

class TriviaApiRepository implements TriviaRepository
{
    const API_BASE_URL = 'http://numbersapi.com/';
    const QUESTION_COUNT = 20;
    const MIN_NUMBER = 5;
    const MAX_NUMBER = 100;
    private string $triviaNumbers;

    public function store(): void
    {
        $this->setTriviaNumbers();

        var_dump($this->triviaNumbers);

        $triviaJSON = file_get_contents(self::API_BASE_URL . $this->triviaNumbers);
        $trivia = json_decode($triviaJSON, true);

        foreach ($trivia as $answer => $question) {
            Trivia::updateOrCreate(
                ['answer' => $answer],
                ['answer' => $answer, 'question' => $question]
            );
        }
    }

    public function triviaNumbers(): string
    {
        return $this->triviaNumbers;
    }

    private function setTriviaNumbers(): void
    {
        $ids = range(self::MIN_NUMBER, self::MAX_NUMBER);
        shuffle($ids);
        $this->triviaNumbers = implode(',', array_slice($ids, 0, self::QUESTION_COUNT));
    }
}
