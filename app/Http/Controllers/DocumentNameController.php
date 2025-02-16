<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DocumentName;
use Illuminate\Support\Facades\Log;

class DocumentNameController extends Controller
{
    public function index()
    {
        try {
            $documentNames = DocumentName::orderBy('created_at', 'desc')->get();
            return view('pages.documents.document_names', compact('documentNames'));
        } catch (\Exception $e) {
            Log::error('Error fetching document names: ' . $e->getMessage());
            return response()->json(['error' => 'Something went wrong.'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'document_name' => 'required|string|max:255',
                'expiry_reminder' => 'required|boolean',
            ]);
            DocumentName::create([
                'document_name' => $request->document_name,
                'expiry_reminder' => $request->expiry_reminder,
            ]);
            return response()->json(['success' => 'Document Name added successfully']);
        } catch (\Exception $e) {
            Log::error('Error storing document name: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to add document name.'], 500);
        }
    }
    

    public function update(Request $request, $id)
    {
        try {
            $documentName = DocumentName::findOrFail($id);
            $request->validate([
                'document_name' => 'required|string|max:255'
            ]);
            $documentName->update($request->all());
            return response()->json(['message' => 'Document name updated successfully.'], 200);
        } catch (\Exception $e) {
            Log::error('Error updating document name: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to update document name.'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $documentName = DocumentName::findOrFail($id);
            $documentName->delete();
            return response()->json(['success' => true, 'message' => 'Document name deleted successfully.'], 200);
        } catch (\Exception $e) {
            Log::error('Error deleting document name: ' . $e->getMessage());
            return response()->json(['success' => false, 'error' => 'Failed to delete document name.'], 500);
        }
    }

    
    


    public function toggle($id)
    {
        try {
            $documentName = DocumentName::findOrFail($id);
            $documentName->expiry_reminder = !$documentName->expiry_reminder;  // Toggle the value
            $documentName->save();
            return response()->json(['success' => 'Expiry reminder status toggled successfully']);
        } catch (\Exception $e) {
            Log::error('Error toggling expiry reminder: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to toggle expiry reminder status.'], 500);
        }
    }


    public function edit($id)
    {
        try {
            $documentName = DocumentName::findOrFail($id);
            return response()->json($documentName);
        } catch (\Exception $e) {
            Log::error('Error fetching document name: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to fetch document name.'], 500);
        }
    }


}
