<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Service;
use App\Models\User;
use Pusher\Pusher;

class PusherService
{
    protected $pusher;

    public function __construct()
    {
        $options = ['cluster' => 'ap2', 'useTLS' => false];
        $this->pusher = new Pusher('4f329c33c16811113829', '2e9636fe84771c31307a', '1943077', $options);
    }

    public function sendTransactionNotification($transaction)
    {
        $user = User::find($transaction->user_id);
        $order = Order::find($transaction->order_id);
        $service = Service::find($transaction->service_id);
        $message = "{$user->name} added Transaction for customer {$order->customer_name} using service {$service->service_name} with application number {$transaction->application_no}";
        $data = ['message' => $message];
        $this->pusher->trigger('new-transaction-channel', 'transaction-added', $data);
    }

    public function sendTransactionStatusNotification($transaction)
    {
        $order = Order::find($transaction->order_id);
        $message = "Application '{$transaction->application_no}' status has been updated to {$transaction->status}.";
        $data = ['message' => $message];
        $this->pusher->trigger('transaction-status-channel', 'status-updated', $data);
    }
}

