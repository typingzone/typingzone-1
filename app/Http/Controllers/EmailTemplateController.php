<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailTemplate;

class EmailTemplateController extends Controller
{
    public function index() {
        $templates = EmailTemplate::orderBy('created_at', 'desc')->get();
        return view('pages.email_templates.email_templates', compact('templates'));
    }

    public function store(Request $request) {
        EmailTemplate::create([
            'title' => $request->title,
            'subject' => $request->subject,
            'body' => $request->body
        ]);
        return response()->json(['success' => true]);
    }

    public function edit($id) {
        $template = EmailTemplate::find($id);
        if($template) {
            return response()->json(['success' => true, 'template' => $template]);
        }
        return response()->json(['success' => false]);
    }

    public function update(Request $request, $id) {
        $template = EmailTemplate::find($id);
        if ($template) {
            $template->update([
                'title' => $request->title,
                'subject' => $request->subject,
                'body' => $request->body
            ]);
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }

    public function destroy($id) {
        $template = EmailTemplate::find($id);
        if($template) {
            $template->delete();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }
}
