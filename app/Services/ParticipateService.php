<?php

namespace App\Services;

use App\Models\Challange;
use App\Models\User;

class ParticipateService
{
    /**
     *
     * @param int $challangeId
     * @param User $user
     * @param int $tenantId
     * @return \App\Models\Challange
     */
    public function participateInChallange(int $challangeId, User $user, int $tenantId)
    {
        $challange = Challange::where('tenant_id', $tenantId)
            ->findOrFail($challangeId);

        $userChallange = $user->challenges()->updateOrCreate(
            ['challange_id' => $challange->id], 
            ['score' => 0] 
        );

        return $userChallange;
    }
}
