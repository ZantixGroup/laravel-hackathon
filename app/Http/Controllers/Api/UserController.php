<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\LeaderBoardResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return LeaderBoardResource::collection(User::orderBy('score', 'desc')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        return new UserResource(User::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, int $id)
    {
        User::find($id)->update($request->validated());
        return new UserResource(User::find($id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $user = User::find($id);
        $user->delete();
        return new UserResource($user);
    }

    public function point_assign(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'name' => 'required',
            'points' => 'required|integer',
        ]);

        $str = $validated['name'];
        $user->$str += $validated['points'];
        $user->score = $user->s_level + $user->t_level + $user->e_level + $user->m_level;
        $user->save();

        return new UserResource($user);
    }

}
