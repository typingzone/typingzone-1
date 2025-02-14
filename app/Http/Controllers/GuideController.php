<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guide;
use Illuminate\Support\Facades\Log;

class GuideController extends Controller
{
    public function index()
    {
        try {
            $guides = Guide::orderBy('created_at', 'desc')->get();
            return view('pages.guides.guides', compact('guides'));
        } catch (\Exception $e) {
            Log::error('Error fetching guides: ' . $e->getMessage());
            return response()->json(['error' => 'Something went wrong.'], 500);
        }
    }

    public function store(Request $request)
    {
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
    }

    public function update(Request $request, $id)
    {
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
    }
}
