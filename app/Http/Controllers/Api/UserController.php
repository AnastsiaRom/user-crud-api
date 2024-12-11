<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Requests\User\{
    IndexRequest,
    StoreRequest,
    UpdateRequest,
};

use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function __construct(protected UserService $userService) {}

    public function index(IndexRequest $request): JsonResponse
    {
        $users = $this->userService->index($request->validated());

        return response()->json($users);
    }

    public function show(User $user)
    {
        return response()->json($user);
    }

    public function store(StoreRequest $request): JsonResponse
    {
        $user = $this->userService->store($request->validated());

        return response()->json($user, 201);
    }

    public function update(UpdateRequest $request, User $user): JsonResponse
    {
        $user = $this->userService->update($request->validated(), $request->validated());

        return response()->json($user);
    }

    public function destroy(User $user): JsonResponse
    {
        $user->delete();

        return response()->json(['message' => 'User deleted'], 200);
    }
}
