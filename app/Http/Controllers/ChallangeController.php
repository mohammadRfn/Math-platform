<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChallangeRequest;
use App\Http\Requests\UpdateChallangeRequest;
use App\Services\ChallangeService;
use Illuminate\Http\Request;

class ChallangeController extends Controller
{
    protected $challangeService;

    public function __construct(ChallangeService $challangeService)
    {
        $this->challangeService = $challangeService;
    }

    public function index(Request $request)
    {
        $tenantId = $request->user()->tenant_id;
        $challanges = $this->challangeService->listByTenant($tenantId);
        return response()->json($challanges);
    }

    public function store(StoreChallangeRequest $request)
    {
        $tenantId = $request->user()->tenant_id;
        $challange = $this->challangeService->create($request->validated(), $tenantId);
        return response()->json($challange, 201);
    }

    public function update(UpdateChallangeRequest $request, $id)
    {
        $tenantId = $request->user()->tenant_id;
        $challange = $this->challangeService->update($id, $request->validated(), $tenantId);
        return response()->json($challange);
    }

    public function destroy(Request $request, $id)
    {
        $tenantId = $request->user()->tenant_id;
        $this->challangeService->delete($id, $tenantId);
        return response()->json(['message' => 'challange deleted successfully'], 200);
    }
}
