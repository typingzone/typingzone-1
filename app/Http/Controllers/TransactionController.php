<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application; 

class TransactionController extends Controller
{
    // Display the transaction history page
    public function index()
    {
        return view('transactions.transaction_histories');
    }


    public function showTransactionTypes()
    {
        return view('pages.transactions.transaction_types');
    }

    
    // Add a new application
    public function store(Request $request)
    {
        $request->validate([
            'application_name' => 'required|string|max:255',
            'application_data' => 'required',
        ]);
        Application::create([
            'name' => $request->application_name,
            'data' => $request->application_data,
        ]);
        return redirect()->route('application-history')->with('status', 'Application added successfully.');
    }


    // Update an existing application
    public function update(Request $request, $id)
    {
        $request->validate([
            'application_name' => 'required|string|max:255',
            'application_data' => 'required',
        ]);
        $application = Application::findOrFail($id);
        $application->update([
            'name' => $request->application_name,
            'data' => $request->application_data,
        ]);
        return redirect()->route('application-history')->with('status', 'Application updated successfully.');
    }


    // Delete an application
    public function destroy($id)
    {
        $application = Application::findOrFail($id);
        $application->delete();
        return redirect()->route('application-history')->with('status', 'Application deleted successfully.');
    }
}
