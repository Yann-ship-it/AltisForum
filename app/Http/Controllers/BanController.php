<?php

namespace App\Http\Controllers;

use App\Models\Ban;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bannedUsers = Ban::with('user')->get();

        return view('admin.ban.index', compact('bannedUsers'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $user_id = Auth::id();
        $userName = User::where('id', request('user_id'))->value('pseudo');

        return view('admin.ban.create', compact('user_id', 'userName'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'reason' => 'required|string',
        ]);

         // Vérifier si l'utilisateur est déjà banni
         $userId = $request->input('user_id');
         $existingBan = Ban::where('user_id', $userId)
                         ->where('end_date', '>', now()) // Vérifier que le bannissement est actif
                         ->first();

         if ($existingBan) {
             return redirect()->route('ban.index')->with('error', 'Cet utilisateur est déjà banni.');
         }
    
        Ban::create([
            'user_id' => $request->input('user_id'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'reason' => $request->input('reason'),
        ]);

    
        return redirect()->route('ban.index')->with('succes', 'Bannissement ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $ban = Ban::find($id);
    
        if ($ban) {
            $ban->delete();
    
            return redirect()->route('ban.index')->with('succes', 'Le bannissement a été levé avec succès.');
        } else {
            return redirect()->route('ban.index')->with('error', 'Le bannissement spécifié n\'existe pas.');
        }
    }
}