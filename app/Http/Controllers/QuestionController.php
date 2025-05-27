<?php

namespace App\Http\Controllers;

use App\Services\QuestionService;

class QuestionController extends Controller
{
    protected $questionService;
    public function __construct(QuestionService $questionService)
    {
        $this->questionService = $questionService;
    }
    public function index()
    {
        return response()->json($this->questionService->getAllQuestionsWithChallanges());
    }
}
