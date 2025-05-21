<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChallangeRequest;
use App\Http\Requests\UpdateChallangeRequest;
use App\Services\ChallangeService;
use App\Services\ParticipateService;
use Illuminate\Http\Request;

class ChallangeController extends Controller
{
    protected $participateService;
    protected $challangeService;

    public function __construct(ChallangeService $challangeService, ParticipateService $participateService)
    {
        $this->participateService = $participateService;
        $this->challangeService = $challangeService;
    }

    public function index(Request $request)
    {
        if (!$request->user()->can('view rankings')) {
            return response()->json(['error' => 'Forbidden'], 403);
        }
        $tenantId = $request->user()->tenant_id;
        $challanges = $this->challangeService->listByTenant($tenantId);
        return response()->json($challanges);
    }

    public function store(StoreChallangeRequest $request)
    {
        if (!$request->user()->can('manage challenges')) {
            return response()->json(['error' => 'Forbidden'], 403);
        }
        $tenantId = $request->user()->tenant_id;
        $challange = $this->challangeService->create($request->validated(), $tenantId);
        return response()->json($challange, 201);
    }
    public function update(UpdateChallangeRequest $request, $id)
    {
        if (!$request->user()->can('manage challenges')) {
            return response()->json(['error' => 'Forbidden'], 403);
        }
        $tenantId = $request->user()->tenant_id;
        $challange = $this->challangeService->update($id, $request->validated(), $tenantId);
        return response()->json($challange);
    }

    public function destroy(Request $request, $id)
    {
        if (!$request->user()->can('manage challenges')) {
            return response()->json(['error' => 'Forbidden'], 403);
        }
        $tenantId = $request->user()->tenant_id;
        $this->challangeService->delete($id, $tenantId);
        return response()->json(['message' => 'challange deleted successfully'], 200);
    }
    public function participate(Request $request, $id)
    {
        if (!$request->user()->can('participate in challenges')) {
            return response()->json(['error' => 'Forbidden'], 403);
        }

        $tenantId = $request->user()->tenant_id;
        $user = $request->user();

        $userChallange = $this->participateService->participateInChallange($id, $user, $tenantId);

        return response()->json(['message' => 'Successfully participated in the challenge', 'data' => $userChallange], 200);
    }
}
