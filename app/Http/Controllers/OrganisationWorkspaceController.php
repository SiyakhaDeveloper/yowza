<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganisationWorkspaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all workspaces from the database
        $workspaces = Organization::all();

        // Pass the workspaces data to the view for display
        return view('workspace.index', compact('workspaces'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('workspace.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'industry' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'website' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Create a new workspace
        $workspace = Organization::create([
            'name' => $request->name,
            'industry' => $request->industry,
            'location' => $request->location,
            'website' => $request->website,
            'description' => $request->description,
        ]);

        // Optionally, you can perform additional actions here,
        // such as associating the workspace with the currently authenticated user.

        // Return a response indicating success
        return response()->json(['message' => 'Workspace created successfully', 'workspace' => $workspace], 201);
    }

    public function join(Request $request, Organization $workspace)
    {
        // Check if the user is already a member of the workspace
        if ($workspace->users()->where('id', Auth::id())->exists()) {
            return redirect()->back()->with('error', 'You are already a member of this workspace.');
        }

        // Add the current user to the workspace
        $workspace->users()->attach(Auth::id());

        return redirect()->route('workspace.index')->with('success', 'You have successfully joined the workspace.');
    }

    public function invite(Request $request, $workspaceId)
    {
        $workspace = Organization::findOrFail($workspaceId);

        // Validate the request data
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        // Check if the user is already a member of the workspace
        if ($workspace->users()->where('email', $request->email)->exists()) {
            return redirect()->back()->with('error', 'This user is already a member of the workspace.');
        }

        // Add the user to the workspace
        $user = User::where('email', $request->email)->first();
        $workspace->users()->attach($user->id);

        return redirect()->route('workspaces.show', $workspace->id)->with('success', 'User invited to the workspace successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
