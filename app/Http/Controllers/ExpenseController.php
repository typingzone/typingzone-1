<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;

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
    }


}
