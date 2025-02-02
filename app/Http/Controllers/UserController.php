<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $results = User::withoutRole('admin')->get();
        return view('admin.user.index', compact('results'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'role'                => 'required|string|in:admin,researcher,assistant',
            'name'                => 'required|string|max:255',
            'email'               => 'required|email|unique:users,email',
            'password'            => 'required|string|min:8',
            'contact_information' => 'nullable|string|max:255',
            'area_of_expertise'   => 'nullable|string|max:255',
        ]);

        $user                      = new User();
        $user->name                = $request->name;
        $user->email               = $request->email;
        $user->password            = Hash::make($request->password);
        $user->contact_information = $request->contact_information;
        $user->area_of_expertise   = $request->area_of_expertise;
        $user->save();

        $user->assignRole($request->role);

        return redirect()->route('users.index')->with('msg', 'User created successfully');
    }

    public function edit($id)
    {
        $result = User::with('roles')->findOrFail($id);
        $roles = ['admin', 'researcher', 'assistant'];
        return view('admin.user.edit', compact('result', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'role'                => 'required|string|in:admin,researcher,assistant',
            'name'                => 'required|string|max:255',
            'email'               => 'required|email|unique:users,email,' . $id,
            'password'            => 'nullable|string|min:8',
            'contact_information' => 'nullable|string|max:255',
            'area_of_expertise'   => 'nullable|string|max:255',
        ]);

        $user        = User::findOrFail($id);
        $user->name  = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->contact_information = $request->contact_information;
        $user->area_of_expertise   = $request->area_of_expertise;
        $user->save();
        $user->syncRoles([$request->role]);

        return redirect()->route('users.index')->with('msg', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('msg', 'User deleted successfully');
    }
}
