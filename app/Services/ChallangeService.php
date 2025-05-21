<?php

namespace App\Services;

use App\Models\Challange;

class ChallangeService
{
    public function listByTenant($tenantId)
    {
        return Challange::where('tenant_id', $tenantId)->get();
    }

    public function create(array $data, $tenantId)
    {
        $data['tenant_id'] = $tenantId;
        return Challange::create($data);
    }

    public function update($id, array $data, $tenantId)
    {
        $challange = Challange::where('tenant_id', $tenantId)->findOrFail($id);
        $challange->update($data);
        return $challange;
    }

    public function delete($id, $tenantId)
    {
        $challange = Challange::where('tenant_id', $tenantId)->findOrFail($id);
        $challange->delete();
        return true;
    }

    public function findById($id, $tenantId)
    {
        return Challange::where('tenant_id', $tenantId)->findOrFail($id);
    }
}
