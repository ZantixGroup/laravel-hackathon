<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(UserRequest $request) {
        $validated = $request->validate([
            'avatar' => 'required|integer',
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'email' => 'required|unique:users,email|email|max:255',
            'password' => 'required|confirmed|min:8|max:255',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);
        return new UserResource($user);
    }

    public function login(Request $request) {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $validated['email'])->first();
        if ($user && Hash::check($validated['password'], $user->password)) {
            return response()->json([
                'user' => new UserResource($user),
                'access_token' => $user->createToken('login')->accessToken,
            ]);
        }

        return response()->json([
            'error' => 'Unauthenticated',
        ], 401);
    }

    public function selfEdit(UserRequest $request) {
        $validated = $request->validated();

        $user = auth()->user();
        $user->update($validated);

        return new UserResource($user);
    }

    public function logout() {
        auth()->user()->token()->revoke();
        return response()->json([
            'message' => 'Logged out',
        ]);
    }

    public function user() {
        return new UserResource(auth()->user());
    }

    public function passwordReset(Request $request, string $mail)
    {
        $user = User::where('email', $mail)->FirstOrFail();

        $validated = $request->validate([
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $user->update(['password' => $validated['password']]);

        return response()->json([
            'data' => 'Parole veiksmīgi nomainīta',
        ]);
    }
}
