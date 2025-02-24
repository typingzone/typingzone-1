<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Credential;

class CredentialController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        $credentials = Credential::all();
=======
        $credentials = Credential::orderBy('created_at', 'desc')->get();
>>>>>>> 023abcbfc092666fd811ecc2b6e7e0a49bdf5ac0
        return view('credentials.index', compact('credentials'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'key' => 'required|string|unique:credentials,key',
            'value' => 'required|string',
        ]);

        Credential::create($request->all());
        return redirect()->route('credentials.index')->with('status', 'Credential added successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'key' => 'required|string|unique:credentials,key,' . $id,
            'value' => 'required|string',
        ]);
        $credential = Credential::findOrFail($id);
        $credential->update($request->all());
        return redirect()->route('credentials.index')->with('status', 'Credential updated successfully.');
    }

    public function destroy($id)
    {
        $credential = Credential::findOrFail($id);
        $credential->delete();
        return redirect()->route('credentials.index')->with('status', 'Credential deleted successfully.');
    }
}
