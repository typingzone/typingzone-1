<?php

namespace App\Http\Controllers;
use App\Models\Reminder;
use Illuminate\Http\Request;

class ReminderController extends Controller
{
    public function index()
    {
        $reminders = Reminder::all();
        return view('pages.reminders.reminders', compact('reminders'));
    }


    public function updateReminders(Request $request)
    {
        $reminder = Reminder::find($request->id);
        if ($reminder) {
            $reminder->status = $request->status;
            $reminder->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }
}
