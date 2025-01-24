<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guide;

class GuideController extends Controller
{
    public function index()
    {
        $guides = Guide::all();
        return view('guides.index', compact('guides'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        Guide::create($request->all());
        return redirect()->route('guides.index')->with('status', 'Guide added successfully.');
    }

    public function update(Request $request, $id)
    {
        $guide = Guide::findOrFail($id);
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        $guide->update($request->all());
        return redirect()->route('guides.index')->with('status', 'Guide updated successfully.');
    }

    public function destroy($id)
    {
        $guide = Guide::findOrFail($id);
        $guide->delete();
        return redirect()->route('guides.index')->with('status', 'Guide deleted successfully.');
    }
}
