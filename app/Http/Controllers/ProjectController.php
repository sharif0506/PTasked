<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class ProjectController extends MainController
{
    public function index(): JsonResponse
    {
        try {
            $projects = Project::all();

            return (ProjectResource::collection($projects))->response()->setStatusCode(200);

        } catch (\Exception $exception) {

            Log::error($exception);
            return response()->json(['error' => 'An unexpected error occurred.'.$exception->getMessage()], 500);
        }
    }

    public function show($id): JsonResponse
    {
        try {
            $project = Project::findOrFail($id);

            return (new ProjectResource($project))->response()->setStatusCode(200);

        } catch (ModelNotFoundException $exception) {

            Log::error($exception);
            return response()->json(['message' => 'Project not found.'], 404);

        } catch (\Exception $exception) {

            Log::error($exception);
            return response()->json(['error' => 'An unexpected error occurred.'], 500);
        }
    }

    public function store(ProjectRequest $request): JsonResponse
    {
        try {
            $project = Project::create($request->validated());

            return (new ProjectResource($project))->response()->setStatusCode(201);

        } catch (\Exception $exception) {

            Log::error($exception);
            return response()->json(['error' => 'An unexpected error occurred.'. $exception->getMessage()], 500);
        }
    }


    public function update(ProjectRequest $request, $id): JsonResponse
    {
        try {
            $project = Project::findOrFail($id);
            $project->update($request->validated());

            return (new ProjectResource($project))->response()->setStatusCode(200);

        } catch (ModelNotFoundException $exception) {

            Log::error($exception);
            return response()->json(['message' => 'Project not found.'], 404);

        } catch (\Exception $exception) {

            Log::error($exception);
            return response()->json(['error' => 'An unexpected error occurred.'], 500);
        }
    }

    public function destroy($id): JsonResponse
    {
        try {
            $project = Project::findOrFail($id);
            $project->delete();

            return response()->json(['message' => 'Project deleted successfully.'], 204);

        } catch (ModelNotFoundException $exception) {

            Log::error($exception);
            return response()->json(['message' => 'Project not found.'], 404);

        } catch (\Exception $exception) {

            Log::error($exception);
            return response()->json(['error' => 'An unexpected error occurred.'], 500);
        }
    }


}
