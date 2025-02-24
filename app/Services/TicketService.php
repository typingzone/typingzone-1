<?php

namespace App\Services;

use App\Models\Ticket;
use Exception;

class TicketService
{
    public function createTicket($data)
    {
        try {
            $ticket = Ticket::create([
                'description' => $data['description'],
            ]);
            return $ticket;
        } catch (Exception $e) {
            throw new Exception("Error creating ticket: " . $e->getMessage());
        }
    }
}
