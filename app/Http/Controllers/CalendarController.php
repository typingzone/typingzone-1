<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class CalendarController extends Controller
{
    public function index(){
        $notes = Note::select('title', 'note', 'reminder_date as start')->whereNotNull('reminder_date')->get();
        return view('pages.others.calendar', compact('notes'));
    }
    
}
