<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\Order; 
use App\Models\Document; 
use App\Models\Expense;
use Illuminate\Support\Facades\Auth;


class IndexController extends Controller
{
    public function index()
    {
        $expiredDocuments = Document::whereBetween('expiry_date', [now(), now()->addMonths(2)])->orderBy('expiry_date', 'asc')->get();
        $expiredDocumentsCount = Document::where('expiry_date', '<', now())->count();
        $pendingTasks = Order::where('assign_to', Auth::id())->where('status', 'pending')->latest()->take(5)->get();
        $totalExpenses = Expense::sum('amount');
        return view('pages.dashboard.index', compact('expiredDocuments', 'expiredDocumentsCount', 'pendingTasks', 'totalExpenses'));
    }
    
}
