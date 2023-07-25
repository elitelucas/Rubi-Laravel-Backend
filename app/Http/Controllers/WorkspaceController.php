<?php

namespace App\Http\Controllers;

use App\Actions\Workspace\CreateWorkspace;
use App\Actions\Workspace\ListAllWorkspaces;
use App\Actions\Workspace\RemoveWorkspace;
use App\Actions\Workspace\UpdateWorkspace;
use App\Http\Requests\WorkspaceStoreRequest;
use App\Http\Requests\WorkspaceUpdateRequest;
use App\Http\Resources\WorkspaceResource;
use App\Models\User;
use App\Models\Workspace;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class WorkspaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user, Request $request, ListAllWorkspaces $listAllWorkspaces): AnonymousResourceCollection
    {
        return WorkspaceResource::collection($listAllWorkspaces->handle(user: $user, request: $request));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(User $user, WorkspaceStoreRequest $request, CreateWorkspace $workspaceCreator): WorkspaceResource
    {
        $workspace = $workspaceCreator->handle(user: $user, data: $request->safe()->toArray());
        return WorkspaceResource::make($workspace);
    }

    /**
     * Display the specified resource.
     */
    public function show(Workspace $workspace): WorkspaceResource
    {
        return WorkspaceResource::make($workspace->load(['customer', 'userSubscription', 'userSubscription.subscription']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user, Workspace $workspace, WorkspaceUpdateRequest $request, UpdateWorkspace $workspaceUpdater): WorkspaceResource
    {
        $updatedWorkspace = $workspaceUpdater->handle(workspace: $workspace, data: $request->safe()->toArray());
        return WorkspaceResource::make($updatedWorkspace);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, Workspace $workspace, RemoveWorkspace $workspaceRemover): JsonResponse
    {
        if ($workspaceRemover->handle($workspace)) {
            return response()->json([
                'message' => 'Workspace removed sucessfully.',
            ]);
        }

        return response()->json([
            'error' => 'An error occurred removing workspace.'
        ]);
    }
}
