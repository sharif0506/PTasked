<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectGroupRequest;
use App\Http\Resources\ProjectGroupResource;
use App\Models\ProjectGroup;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;


class ProjectGroupController extends MainController
{
    public function index(): JsonResponse
    {
        try {
            $projectGroup = ProjectGroup::all();

            return (ProjectGroupResource::collection($projectGroup))->response()->setStatusCode(200);

        } catch (ModelNotFoundException $exception) {

            Log::error($exception);
            return response()->json(['message' => 'Project group not found.'], 404);

        } catch (\Exception $exception) {

            Log::error($exception);
            return response()->json(['error' => 'An unexpected error occurred.'], 500);
        }
    }

    public function show($id): JsonResponse
    {
        try {
            $projectGroup = ProjectGroup::findOrFail($id);

            return (new ProjectGroupResource($projectGroup))->response()->setStatusCode(200);

        } catch (ModelNotFoundException $exception) {

            Log::error($exception);
            return response()->json(['message' => 'Project group not found.'], 404);

        } catch (\Exception $exception) {

            Log::error($exception);
            return response()->json(['error' => 'An unexpected error occurred.'], 500);
        }
    }

    public function store(ProjectGroupRequest $request): JsonResponse
    {
        try {
            $projectGroup = ProjectGroup::create($request->validated());

            return (new ProjectGroupResource($projectGroup))->response()->setStatusCode(201);

        } catch (\Exception $exception) {

            Log::error($exception);
            return response()->json(['error' => 'An unexpected error occurred.'], 500);
        }
    }


    public function update(ProjectGroupRequest $request, $id): JsonResponse
    {
        try {
            $projectGroup = ProjectGroup::findOrFail($id);
            $projectGroup->update($request->validated());

            return (new ProjectGroupResource($projectGroup))->response()->setStatusCode(200);

        } catch (ModelNotFoundException $exception) {

            Log::error($exception);
            return response()->json(['message' => 'Project group not found.'], 404);

        } catch (\Exception $exception) {

            Log::error($exception);
            return response()->json(['error' => 'An unexpected error occurred.'], 500);
        }
    }

    public function destroy($id): JsonResponse
    {
        try {
            $projectGroup = ProjectGroup::findOrFail($id);
            $projectGroup->delete();

            return response()->json(['message' => 'Project group deleted successfully.'], 204);

        } catch (ModelNotFoundException $exception) {

            Log::error($exception);
            return response()->json(['message' => 'Project group not found.'], 404);

        } catch (\Exception $exception) {

            Log::error($exception);
            return response()->json(['error' => 'An unexpected error occurred.'], 500);
        }
    }

}
