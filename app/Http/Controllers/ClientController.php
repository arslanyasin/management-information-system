<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Department;
use App\Models\DepartmentPosition;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Nette\Schema\ValidationException;

class ClientController extends Controller
{
    protected $_viewPath = 'clients';

    public function index()
    {
        $clients = Client::with('user')->get();
        return view($this->_viewPath . '.index', compact('clients'));
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
        $client = Client::with('user')->find($id);
        return view($this->_viewPath . '.profile', compact('client'));
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'company_name' => 'required|string',
                'email' => 'required|string|unique:users',
                'phone' => 'required|string|min:11|max:11',
                'first_name' => 'required|string',
                'last_name' => 'required',
                'contact_person' => 'required',
                'password' => 'required|confirmed|min:8',
                'password_confirmation' => 'required',
                'client_id' => 'required',
            ]);
            $user = new User();
            $user->name = $request->input('company_name');
            $user->email = $request->input('email');
            $user->user_type = 3;
            $user->password = Hash::make($request->input('password'));
            $user->save();
            $client = new Client();
            $client->first_name = $request->input('first_name');
            $client->last_name = $request->input('last_name');
            $client->client_id = $request->input('client_id');
            $client->company_name = $request->input('company_name');
            $client->contact_person = $request->input('contact_person');
            $client->phone = $request->input('phone');
            $client->user_id = $user->id;
            $client->save();
            return response(array('status' => 200, 'message' => 'Client created successful'));
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

    public function delete(Request $request)
    {
        try {
            $client = Client::find($request->id);
            $user_id = $client->user_id;
            $client->delete();
            User::find($user_id)->delete();
            return redirect()->back()->withSuccess('Department Deleted Successfuly');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->route($this->_viewPath . '.index');
    }
}
