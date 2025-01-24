<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\Application;
use App\Models\Expense;

class IndexController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.index');
        // $totalUsers = User::count();
        // $totalApplications = Application::count();
        // $totalExpenses = Expense::sum('amount'); 
        // $recentApplications = Application::orderBy('created_at', 'desc')->take(5)->get();
        // $recentExpenses = Expense::orderBy('created_at', 'desc')->take(5)->get();
        
        // return view('dashboard.index', compact('totalUsers', 'totalApplications', 'totalExpenses', 'recentApplications', 'recentExpenses'));
    }
}
