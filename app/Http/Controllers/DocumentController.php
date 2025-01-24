<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\Storage;

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

}
