<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reminder;
use App\Models\DocumentName;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

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




        $services = [
            ['service_name' => 'Employment Offer & Pre-Approval Processing (First Visit)', 'govt_cost' => 278.77, 'service_cost' => 0],
            ['service_name' => 'UAE Mofa Attestation', 'govt_cost' => 184.17, 'service_cost' => 0],
            ['service_name' => 'Establishment Card Amendment', 'govt_cost' => 254.83, 'service_cost' => 0],
            ['service_name' => 'Relative Work Permit / Golden Visa Holder', 'govt_cost' => 50.36, 'service_cost' => 0],
            ['service_name' => 'Unskilled Worker Insurance Coverage', 'govt_cost' => 189, 'service_cost' => 0],
            ['service_name' => 'Work Permit Fee (Second Category) - Mohre', 'govt_cost' => 1208.57, 'service_cost' => 0],
            ['service_name' => 'Visa Entry Processing', 'govt_cost' => 356.2, 'service_cost' => 0],
            ['service_name' => 'Change of Status Processing', 'govt_cost' => 660.29, 'service_cost' => 0],
            ['service_name' => 'Skilled Worker Insurance Coverage', 'govt_cost' => 144.38, 'service_cost' => 0],
            ['service_name' => 'Residence Visa Permit Payment', 'govt_cost' => 251.79, 'service_cost' => 0],
            ['service_name' => 'Insurance Registration & Enrollment', 'govt_cost' => 1502, 'service_cost' => 0],
            ['service_name' => 'Residence Visa Issuance', 'govt_cost' => 457.56, 'service_cost' => 0],
            ['service_name' => 'Emirates ID Application', 'govt_cost' => 304.1, 'service_cost' => 0],
            ['service_name' => 'Involuntary Employment Loss Insurance', 'govt_cost' => 126, 'service_cost' => 0],
            ['service_name' => 'ADGM Employment Visa (Outside UAE)', 'govt_cost' => 3237.39, 'service_cost' => 0],
            ['service_name' => 'ADGM Employment Visa (Inside UAE)', 'govt_cost' => 4149.66, 'service_cost' => 0],
            ['service_name' => 'Work Permit Fee (Third Category) - Mohre', 'govt_cost' => 3474.63, 'service_cost' => 0],
            ['service_name' => 'PRO Service Visit to Mohre', 'govt_cost' => 100, 'service_cost' => 0],
            ['service_name' => 'Full-Time Work Permit - ADGM', 'govt_cost' => 300, 'service_cost' => 0],
            ['service_name' => 'Commercial Invoice Attestation (Mofa)', 'govt_cost' => 152.2, 'service_cost' => 0],
            ['service_name' => 'DED Trade License Renewal', 'govt_cost' => 2484.36, 'service_cost' => 0],
            ['service_name' => 'Medical Test for Visa Screening - Abu Dhabi', 'govt_cost' => 250, 'service_cost' => 0],
            ['service_name' => 'Establishment Information Update (Mohre)', 'govt_cost' => 409.25, 'service_cost' => 0],
            ['service_name' => 'Establishment Card Renewal (3 Years)', 'govt_cost' => 558.93, 'service_cost' => 0],
            ['service_name' => 'Sponsor File Creation', 'govt_cost' => 356.2, 'service_cost' => 0],
            ['service_name' => 'ADGM Commercial License Renewal', 'govt_cost' => 3673.2, 'service_cost' => 0],
            ['service_name' => 'Sponsorship File Opening - Dubai', 'govt_cost' => 200, 'service_cost' => 0],
            ['service_name' => 'Golden Residency Issuance (Dubai)', 'govt_cost' => 2706.75, 'service_cost' => 0],
            ['service_name' => 'File Confirmation Statement (ADGM)', 'govt_cost' => 384.01, 'service_cost' => 0],
            ['service_name' => 'Dubai Visit Visa', 'govt_cost' => 390, 'service_cost' => 0],
            ['service_name' => 'Visa On Arrival Extension (Abu Dhabi)', 'govt_cost' => 825.52, 'service_cost' => 0],
            ['service_name' => 'Golden Visa Residence Issuance', 'govt_cost' => 1267.47, 'service_cost' => 0],
            ['service_name' => 'Golden Visa Eid Application', 'govt_cost' => 1115.02, 'service_cost' => 0],
            ['service_name' => 'Golden Visa Status Change', 'govt_cost' => 660.29, 'service_cost' => 0],
            ['service_name' => 'DARB Wallet Top-Up', 'govt_cost' => 0, 'service_cost' => 0],
            ['service_name' => 'Golden Visa Entry Visa', 'govt_cost' => 356.2, 'service_cost' => 0],
            ['service_name' => 'ADGM Data Protection Annual Renewal', 'govt_cost' => 1152.05, 'service_cost' => 0],
            ['service_name' => 'Certified True Copy (ADGM)', 'govt_cost' => 384.01, 'service_cost' => 0],
            ['service_name' => 'Visa Information Modification', 'govt_cost' => 204.15, 'service_cost' => 0],
            ['service_name' => 'Family Visa Holding', 'govt_cost' => 20, 'service_cost' => 0],
        ];
        

        foreach ($services as $service) {
            Service::create([
                'user_id' => Auth::id(),
                'service_name' => $service['service_name'],
                'govt_cost' => $service['govt_cost'],
                'service_cost' => $service['service_cost'],
            ]);
        }


    }
}
