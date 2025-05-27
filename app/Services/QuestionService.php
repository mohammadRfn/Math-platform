<?php

namespace App\Services;

use App\Models\Challange;
use App\Models\Question;

class QuestionService
{
    public function getAllQuestionsWithChallanges()
    {
        $questions = Question::all();

        $challangeIds = $questions->pluck('challange_id')->unique();

        $challanges = Challange::whereIn('id', $challangeIds)->get()->keyBy('id');

        $questions->transform(function ($question) use ($challanges) {
            $question->challange = $challanges->get($question->challange_id);
            return $question;
        });
        return $questions;
    }
}
