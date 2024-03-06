<?php

namespace App\Http\Controllers;

use App\Http\Filters\ProblemFilter;
use App\Http\Requests\Problem\IndexRequest;
use App\Http\Requests\Problem\StoreRequest;
use App\Http\Resources\ProblemResource;
use App\Models\Problem;
use Illuminate\Http\Request;

class ProblemController extends Controller
{
    public function index(IndexRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(ProblemFilter::class, ['queryParams' => array_filter($data)]);
        $problems = Problem::filter($filter)->get();

        return ProblemResource::collection($problems);
    }

    public function show($id) {
        $problem = Problem::findOrFail($id);

        return new ProblemResource($problem);
    }

    public function store(StoreRequest $request) {
        $problem = Problem::create($request->validated());

        return new ProblemResource($problem);
    }

    public function destroy($id) {
        Problem::findOrFail($id)->delete();

        return response()->json([ 'message' => 'Problem deleted' ], 200);
    }
}
