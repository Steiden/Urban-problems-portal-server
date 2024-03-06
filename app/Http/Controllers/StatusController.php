<?php

namespace App\Http\Controllers;

use App\Http\Filters\StatusFilter;
use App\Http\Requests\Status\IndexRequest;
use App\Http\Resources\StatusResource;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index(IndexRequest $request) {
        $data = $request->validated();

        $filter = app()->make(StatusFilter::class, ['queryParams' => array_filter($data)]);
        $statuses = Status::filter($filter)->get();

        return StatusResource::collection($statuses);
    }

    public function show($id) {
        return new StatusResource(Status::find($id));
    }
}
