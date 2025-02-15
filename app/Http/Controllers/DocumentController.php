<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;


class DocumentController extends Controller
{
    
    public function index()
    {
        $documents = Document::with('user', 'documentName')->orderBy('created_at', 'desc')->get(); 
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


    public function download($documentId)
    {
        try {
            $document = Document::findOrFail($documentId);
            $filePath = $document->file;
            $extension = pathinfo($filePath, PATHINFO_EXTENSION);
            $fileName = ($document->documentName->document_name ?? 'document') . '.' . $extension;
            $temporaryUrl = Storage::disk('s3')->temporaryUrl($filePath, now()->addMinutes(5));
            $fileContent = file_get_contents($temporaryUrl);
            $mimeType = Storage::disk('s3')->mimeType($filePath);
            return Response::make($fileContent, 200, [
                'Content-Type' => $mimeType,
                'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
                'Content-Length' => strlen($fileContent)
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Document not found'], 404);
        }
    }
    

    
    
    




}
