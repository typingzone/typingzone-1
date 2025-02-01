<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reminder;
use App\Models\DocumentName;

class InitialSeeder extends Seeder
{
    public function run()
    {
        $reminders = [
            ['reminder_type' => 'Document Expiry', 'status' => 1],
            ['reminder_type' => 'Notes Reminders', 'status' => 1],
            ['reminder_type' => 'Pending Transactions Reminder', 'status' => 1],
            ['reminder_type' => 'Unpaid Invoices Reminder', 'status' => 1],
        ];

        // Creating reminders
        foreach ($reminders as $reminder) {
            Reminder::create([
                'reminder_type' => $reminder['reminder_type'],
                'status' => $reminder['status'],
            ]);
        }

        // Adding document names used in UAE
        $documentNames = [
            'Passport',
            'Emirates ID',
            'Driver License',
            'Visa',
            'Labor Card',
            'Trade License',
            'Vehicle Registration',
            'Medical Insurance Card',
            'Residency Permit',
        ];

        // Loop to create document names
        foreach ($documentNames as $documentName) {
            DocumentName::create([
                'document_name' => $documentName,
            ]);
        }
    }
}
