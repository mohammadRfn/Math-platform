<?php

namespace App\Http\Controllers;

use App\Services\QuestionService;
use App\Services\SearchService;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    protected $questionService;
    protected $searchService;
    public function __construct(QuestionService $questionService, SearchService $searchService)
    {
        $this->searchService = $searchService;
        $this->questionService = $questionService;
    }
    public function index()
    {
        return response()->json($this->questionService->getAllQuestionsWithChallanges());
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $page = $request->input('page', 1);
        $limit = $request->input('limit', 10);
        $filters = $request->only(['difficulty', 'topic', 'challange_id']);

        $questions = $this->searchService->searchQuestions($query, $filters, $page, $limit);

        if ($questions->isEmpty()) {
            return response()->json(['message' => 'No results found'], 404);
        }
        return response()->json(iterator_to_array($questions));
    }
}
