<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        $tasks = Task::all();
=======
        $tasks = Task::orderBy('created_at', 'desc')->get();
>>>>>>> 023abcbfc092666fd811ecc2b6e7e0a49bdf5ac0
        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'status' => 'required|string|in:pending,completed',
        ]);
        Task::create($request->all());
        return redirect()->route('tasks.index')->with('status', 'Task added successfully.');
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'status' => 'required|string|in:pending,completed',
        ]);
        $task->update($request->all());
        return redirect()->route('tasks.index')->with('status', 'Task updated successfully.');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('tasks.index')->with('status', 'Task deleted successfully.');
    }
}
