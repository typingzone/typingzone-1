<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
<<<<<<< HEAD

class ExpenseController extends Controller
{
    // Display a list of all expenses
    public function index()
    {
        $expenses = Expense::all();
        return view('expenses.index', compact('expenses'));
    }


    // Store a new expense in the database
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'date' => 'required|date',
        ]);
        Expense::create([
            'description' => $request->description,
            'amount' => $request->amount,
            'date' => $request->date,
        ]);
        return redirect()->route('expenses.index')->with('status', 'Expense added successfully.');
    }


    // Update an existing expense in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'date' => 'required|date',
        ]);
        $expense = Expense::findOrFail($id);
        $expense->update([
            'description' => $request->description,
            'amount' => $request->amount,
            'date' => $request->date,
        ]);
        return redirect()->route('expenses.index')->with('status', 'Expense updated successfully.');
    }


    // Delete an expense from the database
    public function destroy($id)
    {
        $expense = Expense::findOrFail($id);
        $expense->delete();
        return redirect()->route('expenses.index')->with('status', 'Expense deleted successfully.');
=======
use Illuminate\Support\Facades\Validator;
use \Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::with('user')->orderBy('created_at', 'desc')->get();
        return view('pages.expenses.expenses', compact('expenses'));
    }

  
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'vat' => 'required|integer',
            'amount' => 'required|numeric',
            'file' => 'required|file',
            'date' => 'required|date',
            'description' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
        try {
            $file = $request->file('file')->store('expenses_files', 's3');
            Expense::create([
                'name' => $request->name,
                'vat' => $request->vat,
                'amount' => $request->amount,
                'file' => $file,
                'date' => $request->date,
                'description' => $request->description,
                'user_id' => Auth::user()->id,
            ]);
            return response()->json(['success' => 'Expense added successfully'], 200);
        } catch (\Exception $e) {
            Log::error('Error adding expense: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred while adding the expense. Please try again.'], 500);
        }
    }


    public function destroy($id)
    {
        try {
            $expense = Expense::findOrFail($id);
            if ($expense->file) {
                Storage::disk('s3')->delete($expense->file);
            }
            $expense->delete();
            return response()->json(['success' => 'Expense deleted successfully'], 200);
        } catch (\Exception $e) {
            Log::error('Error deleting expense: ' . $e->getMessage(), ['expense_id' => $id]);
            return response()->json(['error' => 'Failed to delete expense. Please try again.'], 500);
        }
    }

    public function downloadFile($id)
    {
        try {
            $expense = Expense::findOrFail($id);
            if (Storage::disk('s3')->exists($expense->file)) {
                return Storage::disk('s3')->download($expense->file);
            } else {
                return response()->json(['error' => 'File not found.'], 404);
            }
        } catch (\Exception $e) {
            Log::error('Error downloading file: ' . $e->getMessage(), ['expense_id' => $id]);
            return response()->json(['error' => 'Failed to download the file.'], 500);
        }
>>>>>>> 023abcbfc092666fd811ecc2b6e7e0a49bdf5ac0
    }


}
