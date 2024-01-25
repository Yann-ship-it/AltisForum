<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();


        return view('role.index', compact(
        'roles',

    ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $role_id = $request->role_id;

        return view ('role.create', compact('role_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'role_name' => 'required',
        ]);

        Role::create([
            'role_name' => $request->role_name,
        ]);

        return redirect()->route('role.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);

        return view ('role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'role_name' => 'required',
        ]);   

        $role = Role::findOrFail($id);

        $role->update ([
            'role_name' => $request->role_name,
        ]);

        return redirect()->route('dashboard')->with('succes', 'Votre post est bien modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        $role->delete();

        return redirect()
            ->route('dashboard')
            ->with('succes', 'Votre user est bien supprimé');
    }

}
 