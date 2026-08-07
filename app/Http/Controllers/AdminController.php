<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users= User::all();
        return view('pages.admin.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' =>$request->name,
            'email'=>$request->email,
             'password'=>bcrypt ($request->pasword),

        ]);

        return redirect()->route('admin.admin.index')->with('success', 'create new admin is successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users= User::findOrFail(decrypt($id));
        return view('pages.admin.show', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users= User::findOrFail(decrypt($id));
        return view('pages.admin.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $users= User::findOrFail(decrypt($id));

         $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' .$users->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $data = [
            'name' =>$request->name,
            'email'=>$request->email,

        ];

        if($request->filled('password')) {
            $data ['password'] = bcrypt($request->password);
        }

        $users->update($data);

        return redirect()->route('admin.admin.index')->with('success', 'Berhasil memperbarui data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users = User::findOrFail($id);
         $users->delete();

         return redirect()->route('admin.admin.index') ->with('success', 'Delete successfully' );
    }
}
