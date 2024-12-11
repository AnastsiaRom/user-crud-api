<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;

final class UserService
{
    public function index(array $data): LengthAwarePaginator
    {
        $query = User::query();

        if (isset($data['name'])) {
            $query->where('name', 'like', '%' . $data['name'] . '%');
        }

        if (isset($data['sort'])) {
            $query->orderBy('name', $data['sort'] === 'desc' ? 'desc' : 'asc');
        }

        return $query->paginate($data['page'] ?? 10);
    }

    public function store(array $data): User
    {
        return User::create($this->prepareUserData($data));
    }

    public function update(array $data, User $user): User
    {
        $user->update($this->prepareUserData($data, $user));

        return $user;
    }

    protected function prepareUserData(array $data, ?User $user = null): array
    {
        return [
            'name'     => $data['name'] ?? ($user?->name ?? null),
            'email'    => $data['email'] ?? ($user?->email ?? null),
            'password' => isset($data['password']) ? Hash::make($data['password']) : ($user?->password ?? null),
            'ip'       => $data['ip'] ?? ($user?->ip ?? null),
            'comment'  => $data['comment'] ?? ($user?->comment ?? null),
        ];
    }
}
