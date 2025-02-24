<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guide;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Log;
>>>>>>> 023abcbfc092666fd811ecc2b6e7e0a49bdf5ac0

class GuideController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        $guides = Guide::all();
        return view('guides.index', compact('guides'));
=======
        try {
            $guides = Guide::orderBy('created_at', 'desc')->get();
            return view('pages.guides.guides', compact('guides'));
        } catch (\Exception $e) {
            Log::error('Error fetching guides: ' . $e->getMessage());
            return response()->json(['error' => 'Something went wrong.'], 500);
        }
>>>>>>> 023abcbfc092666fd811ecc2b6e7e0a49bdf5ac0
    }

    public function store(Request $request)
    {
<<<<<<< HEAD
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        Guide::create($request->all());
        return redirect()->route('guides.index')->with('status', 'Guide added successfully.');
=======
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
            ]);
            Guide::create($request->all());
            return redirect()->back()->with('success', 'Guide added successfully.');
        } catch (\Exception $e) {
            Log::error('Error storing guide: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Failed to add guide.']);
        }
>>>>>>> 023abcbfc092666fd811ecc2b6e7e0a49bdf5ac0
    }

    public function update(Request $request, $id)
    {
<<<<<<< HEAD
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
=======
        try {
            $guide = Guide::findOrFail($id);
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
            ]);
            $guide->update($request->only(['title', 'description']));
            return response(['status' => 'success', 'message' => 'Guide updated successfully.']);
        } catch (\Exception $e) {
            Log::error('Error updating guide: ' . $e->getMessage());
            return response(['status' => 'error', 'message' => 'Failed to update guide.'], 500);
        }
    }
    

    public function destroy($id)
    {
        try {
            $guide = Guide::findOrFail($id);
            $guide->delete();
            return response(['status' => 'success', 'message' => 'Guide deleted successfully.']);
        } catch (\Exception $e) {
            Log::error('Error deleting guide: ' . $e->getMessage());
            return response(['status' => 'error', 'message' => 'Failed to delete guide.'], 500);
        }
    }

    public function show($id)
    {
        try {
            $guide = Guide::findOrFail($id);
            return response()->json($guide);
        } catch (\Exception $e) {
            Log::error('Error fetching guide details: ' . $e->getMessage());
            return response(['status' => 'error', 'message' => 'Guide not found.'], 404);
        }
>>>>>>> 023abcbfc092666fd811ecc2b6e7e0a49bdf5ac0
    }
}
