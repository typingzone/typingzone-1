<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reminder;

class ReminderSeeder extends Seeder
{
    public function run()
    {
        $reminders = [
            ['reminder_type' => 'Document Expiry', 'status' => 1],
            ['reminder_type' => 'Notes Reminders', 'status' => 1],
            ['reminder_type' => 'Pending Transactions Reminder', 'status' => 1],
            ['reminder_type' => 'Unpaid Invoices Reminder', 'status' => 1],
        ];

        foreach ($reminders as $reminder) {
            Reminder::create([
                'reminder_type' => $reminder['reminder_type'],
                'status' => $reminder['status'],
            ]);
        }
    }
}
