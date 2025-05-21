<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreScoreRequest;
use App\Services\ScoreService;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    protected $scoreService;

    public function __construct(ScoreService $scoreService)
    {
        $this->scoreService = $scoreService;
    }

    public function store(StoreScoreRequest $request, $challangeId)
    {
        if (!$request->user()->can('manage scores')) {
            return response()->json(['error' => 'Forbidden'], 403);
        }
        $user = $request->user();
        $score = $this->scoreService->storeOrUpdate($user->id, $challangeId, $request->validated()['points'], $user->tenant_id);
        return response()->json($score);
    }
}
