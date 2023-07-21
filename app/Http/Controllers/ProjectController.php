<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Employee;
use App\Models\Project;
use App\Models\Resource;
use Illuminate\Http\Request;
use Nette\Schema\ValidationException;

class ProjectController extends Controller
{
    protected $_viewPath = 'projects';

    public function index()
    {
        $projects = Project::with('resources.employee')->get();
        $clients = Client::all();
        $employees = Employee::all();
        return view($this->_viewPath.'.index', compact('clients','employees','projects'));
    }

    public function create()
    {
        // Show create form
    }

    public function detail($id)
    {
        $project = Project::with('resources.employee')->find($id);
        $clients = Client::all();
        $employees = Employee::all();
        return view($this->_viewPath.'.detail', compact('clients','employees','project'));
    }

    public function store(Request $request)
    {
        try {
            // Validate and store the project
            $request->validate([
                'project_name' => 'required|string',
                'client_id' => 'required|string',
                'start_date' => 'required',
                'end_date' => 'required',
                'price' => 'required',
                'price_type' => 'required',
                'priority' => 'required',
                'team_lead' => 'required',
                'members' => 'required',
                'description' => 'required',
            ]);
            $project_id = Project::create($request->all());
            $resource = new Resource();
            $resource->project_id = $project_id->project_id;
            $resource->employee_id = $request->input('team_lead');
            $resource->resource_type = 1;
            $resource->save();
            $members = $request->input('members');
            foreach ($members as $member){
                $resource = new Resource();
                $resource->project_id = $project_id->project_id;
                $resource->employee_id = $member;
                $resource->resource_type = 2;
                $resource->save();
            }

            return response(array('status' => 200, 'message' => 'Project created successful'));
        } catch (\Exception|ValidationException $e) {
            if ($e instanceof ValidationException) {
                return response(array('status' => 422, 'errors' => $e->errors()));
            } else {
                return response(array('status' => 500, 'error_message' => $e->getMessage()));
            }
        }

    }

    public function show($id)
    {
        $project = Project::findOrFail($id);
        return view($this->_viewPath.'.show', compact('project'));
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view($this->_viewPath.'.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the project
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect()->route($this->_viewPath.'.index');
    }
}
