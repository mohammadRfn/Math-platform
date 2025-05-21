<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService; 

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function destroy(Request $request, $id)
    {
        if (!$request->user()->can('delete users')) {
            return response()->json(['error' => 'invalid access'], 403);
        }

        try {
            $this->userService->deleteUser($id, $request->user());
            return response()->json(['message' => 'User deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
