<?php

namespace App\Http\Controllers;

use App\Http\Filters\RoleFilter;
use App\Http\Requests\Role\IndexRequest;
use App\Http\Resources\RoleResource;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(IndexRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(RoleFilter::class, ['queryParams' => array_filter($data)]);
        $roles = Role::filter($filter)->get();

        return RoleResource::collection($roles);
    }

    public function show($id)
    {
        return new RoleResource(Role::find($id));
    }
}
