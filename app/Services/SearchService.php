<?php
namespace App\Services;

use App\Models\Question;
use Illuminate\Support\Facades\Cache;

class SearchService
{
    /**
     *
     * @param string $query
     * @param array $filters
     * @param int $page
     * @param int $limit
     * @return mixed
     */
    public function searchQuestions($query, $filters = [], $page = 1, $limit = 10)
    {
        $cacheKey = "search_results_{$query}_" . md5(json_encode($filters)); 

        return Cache::remember($cacheKey, 60, function () use ($query, $filters, $page, $limit) {
            $queryBuilder = Question::raw(function ($collection) use ($query) {
                return $collection->find([
                    '$text' => ['$search' => $query]
                ]);
            });

            foreach ($filters as $key => $value) {
                $queryBuilder = $queryBuilder->where($key, $value);
            }

            $questions = $queryBuilder->skip(($page - 1) * $limit)->limit($limit);

            return $questions;
        });
    }
}
