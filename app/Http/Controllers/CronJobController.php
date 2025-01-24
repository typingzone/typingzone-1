<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Application; 
use App\Mail\ExpiryDocumentReminderMail;
use Illuminate\Support\Facades\Mail;

class CronJobController extends Controller
{
    public function expiryDocumentReminder(Request $request)
    {
        $documents = Document::where('expiry_date', '<=', now()->addDays(30))->get();
        if ($documents->count() > 0) {
            Mail::to('ali@hubq.ae')->send(new ExpiryDocumentReminderMail($documents));
        }
        return response()->json(['status' => 'success', 'message' => 'Expiry document reminders processed successfully.']);
    }


    public function applicationFollowUpReminder(Request $request)
    {
        $applications = Application::where('status', 'pending')->where('created_at', '<=', now()->subDays(7))->get();
        foreach ($applications as $application) {
            // Send follow-up reminder logic here (e.g., send an email or notification)
        }
        return response()->json(['status' => 'success', 'message' => 'Application follow-up reminders processed successfully.']);
    }
    
}
