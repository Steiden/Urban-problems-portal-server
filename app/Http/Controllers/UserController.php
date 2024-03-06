<?php

namespace App\Http\Controllers;

use App\Http\Filters\UserFilter;
use App\Http\Requests\User\IndexRequest;
use App\Http\Requests\User\StoreRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(IndexRequest $request) {
        $data = $request->validated();
        
        $filter = app()->make(UserFilter::class, ['queryParams' => array_filter($data)]);
        $users = User::filter($filter)->get();

        return UserResource::collection($users);
    }

    public function show($id) {
        return new UserResource(User::findOrFail($id));
    }

    public function store(StoreRequest $request) {
        $data = $request->validated();

        $user = User::create($data);

        return new UserResource($user);
    }

    public function destroy($id) {
        User::findOrFail($id)->delete();

        return response()->json([ 'message' => 'User deleted' ], 200);
    }

    public function update(Request $request, $id) {
        User::findOrFail($id)->update($request->all());

        return new UserResource(User::findOrFail($id));
    }
}
