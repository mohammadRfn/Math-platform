<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function destroy(Request $request, $id)
    {
        if (!$request->user()->can('delete users')) {
            return response()->json(['error' => 'invalid access'], 403);
        }

        $user = User::findOrFail($id);

        if ($user->id === $request->user()->id) {
            return response()->json(['error' => 'you can not delete your account'], 400);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted successfully'], 200);
    }
}
