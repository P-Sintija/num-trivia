<?php

namespace App\Http\Controllers;

use App\Services\UploadTriviaService;
use Illuminate\Http\RedirectResponse;

class UploadTriviaController extends Controller
{
    private UploadTriviaService $uploadTriviaService;

    public function __construct(UploadTriviaService $uploadTriviaService)
    {
        $this->uploadTriviaService = $uploadTriviaService;
    }

    public function store(): RedirectResponse
    {
        $this->uploadTriviaService->storeTrivia();
        return redirect()->route('trivia.index');
    }
}
