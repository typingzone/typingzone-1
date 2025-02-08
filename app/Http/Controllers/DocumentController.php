<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::with('user', 'documentName')->get(); 
        return view('pages.documents.documents', compact('documents'));
    }
    

    public function store(Request $request)
    {
        try {
            $filePath = $request->file('file')->store('documents', 's3');
            Document::create([
                'user_id' => Auth::id(),
                'document_name_id' => $request->document_name_id,
                'file' => $filePath,
                'expiry_date' => $request->expiry_date,
            ]);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            Log::error('Document upload failed: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Document upload failed'], 500);
        }
    }
    

    public function destroy($id)
    {
        try {
            $document = Document::findOrFail($id);
            Storage::disk('s3')->delete($document->file);
            $document->delete();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            Log::error('Document deletion failed: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Document deletion failed'], 500);
        }
    }



}
