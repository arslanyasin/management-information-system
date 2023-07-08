<?php

namespace App\Http\Controllers;

use App\Helpers\ImageHelper;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Nette\Schema\ValidationException;
use Termwind\Components\Dd;

class DepartmentController extends Controller
{
    public function create()
    {
        // Return the view for creating a new user
        return view('departments.create');
    }

    public function store(Request $request)
    {
        try {

            $validatedData = $request->validate([
                'department_name' => 'required|string|unique:departments',
            ]);

            $department = new Department();
            $department->department_name = $request->input('department_name');
            $department->save();
            return response(array('status' => 200, 'message' => 'Department created successful'));
        } catch (\Exception|ValidationException $e) {
            if ($e instanceof ValidationException) {
                return response(array('status' => 422, 'errors' => $e->errors()));
            } else {
                return response(array('status' => 500, 'error_message' => $e->getMessage()));
            }
        }

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

        $user = User::findOrFail($id);
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
        $departments = Department::all();

        // Return the view with a list of departments
        return view('departments.index', compact('departments'));
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
            $department = Department::find($request->department_id);
            $department->delete();
            return redirect()->back()->withSuccess('Department Deleted Successfuly');
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
