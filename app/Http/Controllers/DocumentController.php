<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\Storage;
<<<<<<< HEAD

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::all();
        return view('documents.index', compact('documents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,doc,docx,jpg,png|max:2048',
        ]);
        $path = $request->file('file')->store('documents');
        Document::create([
            'title' => $request->title,
            'file_path' => $path,
        ]);
        return redirect()->route('documents.index')->with('status', 'Document added successfully.');
    }

    public function update(Request $request, $id)
    {
        $document = Document::findOrFail($id);
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:2048',
        ]);
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('documents');
            $document->file_path = $path;
        }
        $document->title = $request->title;
        $document->save();
        return redirect()->route('documents.index')->with('status', 'Document updated successfully.');
    }

    public function destroy($id)
    {
        $document = Document::findOrFail($id);
        $document->delete();
        return redirect()->route('documents.index')->with('status', 'Document deleted successfully.');
    }




    public function downloadCompanyDocument(Request $request)
    {
        $document = Document::where('entity_type', 'company')->findOrFail($request->id);
        return $this->downloadDocument($document);
    }

    public function downloadCustomerDocument(Request $request)
    {
        $document = Document::where('entity_type', 'customer')->findOrFail($request->id);
        return $this->downloadDocument($document);
    }

    private function downloadDocument(Document $document)
    {
        $filePath = $document->document_file;
        if (!Storage::disk('s3')->exists($filePath)) {
            return response()->json(['status' => 'error', 'message' => 'Document not found.'], 404);
        }
        $fileContent = Storage::disk('s3')->get($filePath);
        $newFileName = $document->document_title . '.' . pathinfo($filePath, PATHINFO_EXTENSION);
        return response($fileContent)->header('Content-Type', Storage::disk('s3')->mimeType($filePath))->header('Content-Disposition', 'attachment; filename="' . $newFileName . '"');
    }

=======
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
    

    
    
    




>>>>>>> 023abcbfc092666fd811ecc2b6e7e0a49bdf5ac0
}
