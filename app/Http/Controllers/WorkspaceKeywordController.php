<?php

namespace App\Http\Controllers;

use App\Actions\WorkspaceKeyword\CreateWorkspaceKeyword;
use App\Actions\WorkspaceKeyword\ListAllWorkspaceKeywords;
use App\Actions\WorkspaceKeyword\RemoveWorkspaceKeyword;
use App\Actions\WorkspaceKeyword\UpdateWorkspaceKeyword;
use App\Http\Requests\WorkspaceKeywordStoreRequest;
use App\Http\Requests\WorkspaceKeywordUpdateRequest;
use App\Http\Resources\WorkspaceKeywordResource;
use App\Models\Workspace;
use App\Models\WorkspaceKeyword;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class WorkspaceKeywordController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(WorkspaceKeyword::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Workspace $workspace, Request $request, ListAllWorkspaceKeywords $listAllWorkspaceKeywords): AnonymousResourceCollection
    {
        return WorkspaceKeywordResource::collection($listAllWorkspaceKeywords->handle(workspace: $workspace, request: $request));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Workspace $workspace, WorkspaceKeywordStoreRequest $request, CreateWorkspaceKeyword $workspaceKeywordCreator): WorkspaceKeywordResource
    {
        $keyword = $workspaceKeywordCreator->handle(workspace: $workspace, data: $request->safe()->toArray());
        return WorkspaceKeywordResource::make($keyword);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Workspace $workspace, WorkspaceKeyword $keyword, WorkspaceKeywordUpdateRequest $request, UpdateWorkspaceKeyword $workspaceKeywordUpdater): WorkspaceKeywordResource
    {
        $updatedKeyword = $workspaceKeywordUpdater->handle(workspaceKeyword: $keyword, data: $request->safe()->toArray());
        return WorkspaceKeywordResource::make($updatedKeyword);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Workspace $workspace, WorkspaceKeyword $keyword, RemoveWorkspaceKeyword $workspaceKeywordRemover)
    {
        if ($workspaceKeywordRemover->handle($keyword)) {
            return response()->json([
                'message' => 'Workspace keyword removed sucessfully.',
            ]);
        }

        return response()->json([
            'error' => 'An error occurred removing workspace keyword.'
        ]);
    }
}
