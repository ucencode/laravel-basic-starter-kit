<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $is_add = true;
        $user = new User();
        return view('admin.users.form', compact('is_add', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:6', 'confirmed']
        ]);

        // Store the user
        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['email_verified_at'] = now();

        $user = User::create($validatedData);

        // Redirect to dashboard
        return redirect()->route('users.index')->with('success', 'User created successfully with name ' . $user->name);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $is_add = false;
        $user = User::findOrFail($id);
        return view('admin.users.form', compact('is_add', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,' . $id],
            'password' => ['nullable', 'min:6', 'confirmed']
        ]);

        // Store the user
        $user = User::findOrFail($id);
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        if ($validatedData['password']) {
            $user->password = bcrypt($validatedData['password']);
        }
        $user->save();

        // Redirect to dashboard
        return redirect()->route('users.index')->with('success', "{$user->name} updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json([
            'success' => true,
            'message' => "{$user->name} successfully deleted"
        ], 200);
    }

    public function datatable(Request $request)
    {
        $users = User::select([
            'id',
            'name',
            'email'
        ]);

        return datatables()->of($users)
            ->filter(function ($query) use ($request) {
                if ($request->has('search') && $request->search['value']) {
                    $query->where('name', 'like', "%{$request->search['value']}%");
                    $query->orWhere('email', 'like', "%{$request->search['value']}%");
                }
            })
            ->addColumn('edit_url', function ($user) {
                return route('users.edit', $user->id);
            })
            ->addColumn('delete_url', function ($user) {
                return route('users.destroy', $user->id);
            })
            ->make(true);
    }
}
