<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
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
        return UserResource::collection(User::all());
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

        $request->validate([
            'name' => 'required',
            'points' => 'required|integer',
        ]);

        if ($request['name'] == 's_level')
        {
            $user->s_level = $user->s_level + $request['points'];
            $user->update([
                's_level' => $user->s_level,
            ]);
        }

        if ($request['name'] == 't_level')
        {
            $user->t_level = $user->t_level + $request['points'];
            $user->update([
                't_level' => $user->t_level,
            ]);
        }

        if ($request['name'] == 'e_level')
        {
            $user->e_level = $user->e_level + $request['points'];
            $user->update([
                'e_level' => $user->e_level,
            ]);
        }

        if ($request['name'] == 'm_level')
        {
            $user->m_level = $user->m_level + $request['points'];
            $user->update([
                'm_level' => $user->m_level,
            ]);
        }

        $user->update([
            'score' => $user->s_level + $user->t_level + $user->e_level + $user->m_level,
        ]);

        return new UserResource($user);
    }

}
