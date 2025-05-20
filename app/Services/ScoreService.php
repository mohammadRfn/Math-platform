<?php

namespace App\Services;


use App\Models\Score;
use App\Models\Challange;

class ScoreService
{
    public function storeOrUpdate($userId, $challangeId, $points, $tenantId)
    {
        $challange = Challange::where('tenant_id', $tenantId)
            ->findOrFail($challangeId);

        return Score::updateOrCreate(
            ['user_id' => $userId, 'challange_id' => $challange->id],
            ['points' => $points]
        );
    }
}