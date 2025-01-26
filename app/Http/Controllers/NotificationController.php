<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alert;

class NotificationController extends Controller
{
    public function showNotificationPreferences()
    {
        // $alerts = Alert::all();
        // return view('alerts.index', compact('alerts'));
        return view('pages.notification_preferences.notification_preferences');
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:alerts,id',
            'message' => 'required|string|max:255',
            'is_active' => 'required|boolean',
        ]);
        $alert = Alert::findOrFail($request->id);
        $alert->update($request->only(['message', 'is_active']));
        return redirect()->route('alerts.index')->with('status', 'Alert updated successfully.');
    }
}
