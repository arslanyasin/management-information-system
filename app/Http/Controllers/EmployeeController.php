<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\DepartmentPosition;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Nette\Schema\ValidationException;

class EmployeeController extends Controller
{
    protected $_viewPath = 'employees';

    public function index()
    {
        $employees = Employee::with(array('department', 'position'))->get();
        $departments = Department::all();
        return view($this->_viewPath . '.index', compact('employees','departments'));
    }

    public function create()
    {
        // Show create form
        $departments = Department::all();
        // Return the view for creating a new user
        return view($this->_viewPath . '.create', compact('departments'));
    }

    public function profile($id)
    {
        // Show create form
        $employee = Employee::with(array('department', 'position','user'))->find($id);
        return view($this->_viewPath . '.profile', compact('employee'));
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'email' => 'required|string|unique:users',
                'phone' => 'required|string|min:11|max:11',
                'hire_date' => 'required|string',
                'department_id' => 'required',
                'position_id' => 'required',
                'password' => 'required|confirmed|min:8',
                'password_confirmation' => 'required',
                'image' => 'required',
            ]);
            $image = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/profile'), $image);
            $user = new User();
            $user->name = $request->input('name');
            $user->user_type = 2;
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->profile_image = 'uploads/profile/'.$image;
            $user->save();
            $employee = new Employee();
            $employee->name = $request->input('name');
            $employee->email = $request->input('email');
            $employee->phone = $request->input('phone');
            $employee->hire_date = $request->input('hire_date');
            $employee->department_id = $request->input('department_id');
            $employee->position_id = $request->input('position_id');
            $employee->user_id = $user->id;
            $employee->save();
            return response(array('status' => 200, 'message' => 'Employee created successful'));
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
        $employee = Employee::findOrFail($id);
        return view($this->_viewPath . '.edit', compact('employee'));
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $departments = Department::all();
        $positions = DepartmentPosition::where(array('department_id' => $employee->department_id))->get();
        return view($this->_viewPath . '.edit', compact('employee', 'departments', 'positions'));
    }

    public function update(Request $request, $id)
    {
        try {
            $employee = Employee::findOrFail($id);;
            $validatedData = $request->validate([
                'name' => 'required|string',
                'email' => 'required|string|unique:users,email,' . $employee->user_id,
                'secondary_email' => 'required|string',
                'phone' => 'required|string|min:11|max:11',
                'hire_date' => 'required|string',
                'department_id' => 'required',
                'position_id' => 'required',
            ]);

            $user = User::findOrFail($employee->user_id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->save();
            $employee->name = $request->input('name');
            $employee->email = $request->input('secondary_email');
            $employee->phone = $request->input('phone');
            $employee->hire_date = $request->input('hire_date');
            $employee->department_id = $request->input('department_id');
            $employee->position_id = $request->input('position_id');
            $employee->save();
            return response()->json(['status' => 200, 'message' => 'User updated successfully']);
        } catch (\Exception|ValidationException $e) {
            if ($e instanceof ValidationException) {
                return response(array('status' => 422, 'errors' => $e->errors()));
            } else {
                return response(array('status' => 500, 'error_message' => $e->getMessage()));
            }
        }
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->route('employees.index');
    }
}
