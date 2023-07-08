<?php

namespace App\Http\Controllers;

use App\Helpers\ImageHelper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Nette\Schema\ValidationException;

class UserController extends Controller
{
    public function create()
    {
        // Return the view for creating a new user
        return view('users.create');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:8',
            ]);

            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->save();

            return response(array('status' => 200, 'message' => 'User created successful'));

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
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'email' => 'required|string|unique:users',
                'phone' => 'required|string|min:11|max:11',
                'hire_date' => 'required|string',
                'department_id' => 'required',
                'position_id' => 'required',
            ]);

            $user = User::findOrFail($id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');

            if ($request->filled('password')) {
                $user->password = Hash::make($request->input('password'));
            }

            $user->save();

            return response()->json(['status' => 200, 'message' => 'User updated successfully']);
        } catch (\Exception|ValidationException $e) {
            if ($e instanceof ValidationException) {
                return response(array('status' => 422, 'errors' => $e->errors()));
            } else {
                return response(array('status' => 500, 'error_message' => $e->getMessage()));
            }
        }
    }

    public function index()
    {
        $users = User::all();

        // Return the view with a list of users
        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        // Return the view with the user details
        return view('users.edit', compact('user'));
    }

    public function delete(Request $request)
    {
        try {
            $user = User::find($request->user_id);
            $user->delete();
            return redirect()->back()->withSuccess('User Deleted Successfuly');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index');
    }
}
