<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return abort(404);
        }

        $comments = Comment::all();

        return view('user.show', compact('user', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()
                ->route('admin.adminboard')
                ->with('error', 'Utilisateur introuvable');
        }

        if ($request->role == $user->role_id) {
            return redirect()
                ->route('admin.adminboard')
                ->with('error', 'Mise à jour non effectuée, les rôles sont identiques.');
        }

        $request->validate([
            'role' => 'required',
        ]);

        $user->update([
            'role_id' => $request->role,
        ]);

        $user->save();

        return redirect()
            ->route('admin.adminboard')
            ->with('succes', 'Rôle mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        // $user->detach();

        $user->delete();

        return redirect()
            ->route('dashboard')
            ->with('succes', 'Votre user est bien supprimé');
    }
}
