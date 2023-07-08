<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function create()
    {
        // Return the view for creating a new resource
        return view('resources.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'project_id' => 'required|integer',
            'resource_name' => 'required|string',
            'resource_type' => 'required|string',
            'quantity' => 'required|integer',
        ]);

        $resource = new Resource();
        $resource->project_id = $request->input('project_id');
        $resource->resource_name = $request->input('resource_name');
        $resource->resource_type = $request->input('resource_type');
        $resource->quantity = $request->input('quantity');
        $resource->save();

        return redirect()->route('resources.index');
    }

    public function edit($id)
    {
        $resource = Resource::findOrFail($id);

        // Return the view for editing the resource
        return view('resources.edit', compact('resource'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'project_id' => 'required|integer',
            'resource_name' => 'required|string',
            'resource_type' => 'required|string',
            'quantity' => 'required|integer',
        ]);

        $resource = Resource::findOrFail($id);
        $resource->project_id = $request->input('project_id');
        $resource->resource_name = $request->input('resource_name');
        $resource->resource_type = $request->input('resource_type');
        $resource->quantity = $request->input('quantity');
        $resource->save();

        return redirect()->route('resources.index');
    }

    public function index()
    {
        $resources = Resource::all();

        // Return the view with a list of resources
        return view('resources.index', compact('resources'));
    }

    public function show($id)
    {
        $resource = Resource::findOrFail($id);

        // Return the view with the resource details
        return view('resources.show', compact('resource'));
    }

    public function destroy($id)
    {
        $resource = Resource::findOrFail($id);
        $resource->delete();

        return redirect()->route('resources.index');
    }
}
