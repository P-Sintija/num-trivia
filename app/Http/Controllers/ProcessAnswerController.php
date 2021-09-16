<?php

namespace App\Http\Controllers;

use App\Requests\Answer;
use App\Services\ProcessAnswerService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProcessAnswerController extends Controller
{
    private ProcessAnswerService $processAnswerService;

    public function __construct(ProcessAnswerService $processAnswerService) 
    {
        $this->processAnswerService = $processAnswerService;
    }

    public function update(Request $request): RedirectResponse
    {
        $this->processAnswerService->update(new Answer($request['answer'], $request['id']));
        return redirect()->route('trivia.index');
    }
}
