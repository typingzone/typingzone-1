<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TicketService;
use Illuminate\Support\Facades\Validator;
use Exception;
use App\Models\Ticket;

class TicketController extends Controller
{
    protected $ticketService;

    public function __construct(TicketService $ticketService)
    {
        $this->ticketService = $ticketService;
    }

    public function index()
    {
        $tickets = Ticket::orderBy('created_at', 'desc')->get();
        return view('pages.tickets.tickets', compact('tickets'));
    }


    public function addTicket(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'description' => 'required|string|max:1000',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            $this->ticketService->createTicket($request->all());
            return redirect()->back()->with('success', 'Ticket created successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);
        return response()->json($ticket);
    }


    public function updateTicket(Request $request)
    {
        $ticket = Ticket::findOrFail($request->ticket_id);
        $ticket->update($request->all());
        return redirect()->back()->with('success', 'Ticket updated successfully');
    }


    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();
        return response()->json(['message' => 'Ticket deleted successfully']);
    }

    public function showTicket($id)
    {
        $ticket = Ticket::findOrFail($id);
        return response()->json($ticket);
    }

}
