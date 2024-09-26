<?php
// app/Http/Controllers/UserController.php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        $users = User::with('roles')->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required', 'email' => 'required|email|unique:users', 'password' => 'required|min:6']);
        $user = User::create($request->all());
        // Assign default role if needed
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate(['name' => 'required', 'email' => 'required|email|unique:users,email,' . $user->id]);
        $user->update($request->all());
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    public function editRole(User $user)
    {
        // Get all roles for the dropdown
        $roles = Role::all();
        return view('users.edit-role', compact('user', 'roles'));
    }

    public function updateRole(Request $request, User $user)
    {
        $request->validate([
            'roles' => 'array',
            'roles.*' => 'exists:roles,id', // Validate role IDs
        ]);

        // Sync roles with the user
        $user->roles()->sync($request->roles);

        return redirect()->route('users.index')->with('success', 'User roles updated successfully.');
    }

}
