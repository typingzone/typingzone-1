<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alert;

class AlertController extends Controller
{
    public function index()
    {
        $alerts = Alert::all();
        return view('alerts.index', compact('alerts'));
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
