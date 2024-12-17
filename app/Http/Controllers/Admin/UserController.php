<?php
namespace App\Http\Controllers; 
use App\Models\User; use Illuminate\Http\Request; 
class UserController extends Controller { public function index() { $users=User::all(); 
    return view('admin.users.index', compact('users'));
 }
    public function edit(User $user) { return view('admin.users.edit', compact('user')); 
    } 
    public function update(Request $request, User $user) { $request->validate([
    'role' => 'required|string',
    ]);

    $user->update($request->all());
    return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
    $user->delete();
    return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
    }