<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guest = Guest::all();
        return view('pages.guest.index', compact('guest'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $guest = Guest::findOrFail($id);
        return view('pages.guest.show', compact('guest'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guest = Guest::findOrFail($id);
         $guest->delete();

         return redirect()->route('pages.guest.index') ->with('success', 'Delete successfully' );
    }
}