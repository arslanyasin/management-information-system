<?php

namespace App\Http\Controllers;

use App\Helpers\ImageHelper;
use App\Models\Department;
use App\Models\DepartmentPosition;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Nette\Schema\ValidationException;
use Termwind\Components\Dd;

class DepartmentPositionController extends Controller
{
    public function create()
    {
        $departments = Department::all();
        // Return the view for creating a new user
        return view('department_positions.create',compact('departments'));
    }

    public function store(Request $request)
    {
        try {

            $validatedData = $request->validate([
                'position_name' => 'required|string',
                'department_id' => 'required',
            ]);
            DepartmentPosition::create($request->all());
            return response(array('status' => 200, 'message' => 'Department Position created successful'));
        } catch (\Exception|ValidationException $e) {
            if ($e instanceof ValidationException) {
                return response(array('status' => 422, 'errors' => $e->errors()));
            } else {
                return response(array('status' => 500, 'error_message' => $e->getMessage()));
            }
        }

    }

    public function getPositionsByDepartment($id)
    {
        return DepartmentPosition::where(array('department_id'=>$id))->get();
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        // Return the view for editing the user
        return view('departments.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'department_name' => 'required|string|unique:departments',
        ]);

        $user = DepartmentPosition::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return response()->json(['status' => 200, 'message' => 'User updated successfully']);

    }

    public function index()
    {
        $positions = DepartmentPosition::with('department')->get();
        // Return the view with a list of postions
        return view('department_positions.index', compact('positions'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        // Return the view with the user details
        return view('departments.edit', compact('user'));
    }

    public function delete(Request $request)
    {
        try {
            $position = DepartmentPosition::find($request->id);
            $position->delete();
            return redirect()->back()->withSuccess('Position Deleted Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('departments.index');
    }
}
