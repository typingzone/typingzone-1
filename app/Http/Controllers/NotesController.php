<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class NotesController extends Controller
{
    public function index()
    {
        $notes = Note::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get(); 
        return view('pages.notes.notes', compact('notes'));
    }
    

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'note' => 'required|string',
                'reminder_date' => 'nullable|date',
            ]);
            Note::create([
                'title' => $request->input('title'),
                'note' => $request->input('note'),
                'reminder_date' => $request->input('reminder_date'),
                'user_id' => Auth::id(),
            ]);
            return redirect()->back()->with('success', 'Note added successfully.');
        } catch (\Exception $e) {
            Log::error('Error creating note: ' . $e->getMessage(), [
                'exception' => $e,
                'user_id' => Auth::id(),
                'data' => $request->all()
            ]);
            return redirect()->back()->with('error', 'An error occurred while adding the note.');
        }
    }
    
    

    public function edit($id)
    {
        $note = Note::findOrFail($id);
        return response()->json($note);
    }

 
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'editTitle' => 'required|string|max:255',
                'editNote' => 'required|string',
                'editreminder_date' => 'nullable|date',
            ]);
            $note = Note::findOrFail($id);
            $note->title = $request->input('editTitle');
            $note->note = $request->input('editNote');
            $note->reminder_date = $request->input('editReminder_date');
            $note->user_id = Auth::id(); 
            $note->save();
            return response()->json(['message' => 'Note updated successfully']);
        } catch (\Exception $e) {
            Log::error('Error updating note: ' . $e->getMessage());
            return response()->json(['message' => 'Error updating note', 'error' => $e->getMessage()], 500);
        }
    }
    
    
    public function destroy($id)
    {
        $note = Note::findOrFail($id);
        $note->delete();
        return response()->json(['message' => 'Note deleted successfully']);
    }
}

