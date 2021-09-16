<?php

namespace App\Services;

use App\Models\UserAnswer;
use App\Requests\Answer;

class ProcessAnswerService
{

    public function update(Answer $answer): void
    {
        UserAnswer::where('id', $answer->answerId())
            ->update([
                'answer_user' =>  $answer->answer()
            ]);
    }
}
