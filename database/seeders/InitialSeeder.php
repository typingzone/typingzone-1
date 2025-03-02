<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reminder;
use App\Models\DocumentName;
use App\Models\Service;
use App\Models\Company;
use App\Models\User;
use App\Models\WebsiteSetup;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class InitialSeeder extends Seeder
{
    public function run()
    {
        // Creating reminders
        $reminders = [
            ['reminder_type' => 'Document Expiry', 'status' => 1],
            ['reminder_type' => 'Notes Reminders', 'status' => 1],
            ['reminder_type' => 'Pending Transactions Reminder', 'status' => 1],
            ['reminder_type' => 'Unpaid Invoices Reminder', 'status' => 1],
            ['reminder_type' => 'Receive Daily Transactions', 'status' => 1],
        ];
        foreach ($reminders as $reminder) {
            Reminder::create([
                'reminder_type' => $reminder['reminder_type'],
                'status' => $reminder['status'],
            ]);
        }

        // Adding document names used in UAE
        $documentNames = [
            'Passport', 'Emirates ID', 'Driver License', 'Visa', 'Labor Card', 'Trade License', 
            'Vehicle Registration', 'Medical Insurance Card', 'Residency Permit',
        ];
        foreach ($documentNames as $documentName) {
            DocumentName::create([
                'document_name' => $documentName,
            ]);
        }

        // Creating the Admin role if not exists
        if (!Role::where('name', 'Admin')->exists()) {
            $role = Role::create(['name' => 'Admin']);
        } else {
            $role = Role::findByName('Admin');
        }
        $user = User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'), 
        ]);
        $user->assignRole('Admin');
        $pages = [
            'Calendar', 'Transactions', 'Archived Transactions', 'Orders', 'Archived Orders', 'Invoices', 
            'Invoice Templates', 'Tickets', 'Expenses', 'Documents', 'Document Names', 'Services', 
            'Manage Users', 'Roles & Permissions', 'Notes', 'Guides', 'Reminders', 'Log Activities', 
            'Login Activities', 'Settings'
        ];
        foreach ($pages as $page) {
            foreach (['view', 'add', 'edit', 'delete', 'download'] as $action) {
                $permissionName = $page . ' ' . $action;
                $permission = Permission::create(['name' => $permissionName]);
                $role->givePermissionTo($permission);
            }
        }

        // Creating services
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
                'user_id' => $user->id, 
                'service_name' => $service['service_name'],
                'govt_cost' => $service['govt_cost'],
                'service_cost' => $service['service_cost'],
            ]);
        }


        // create company
        Company::create([
            'company_name' => 'Typing Zone LLC',
            'company_icon' => '',
            'company_logo' => '',
            'address' => 'Company Address',
            'invoice_templates' => json_encode([
                [
                    'template_name' => 'Emirald',
                    'active' => false
                ],
                [
                    'template_name' => 'Nexus',
                    'active' => true
                ]
            ]),
            'email' => '',
            'phone' => '1234567890',
        ]);


        WebsiteSetup::create([
            'cover_photo' => '',
            'welcome_message' => 'Welcome to Typing Zone LLC',
            'about_us' => 'We are a leading typing center in the UAE offering a variety of services for your document and application needs.',
            'our_services' => json_encode([
                'Emirates ID Application',
                'Visa Application & Renewal',
                'Labor Contract Typing',
                'Medical Fitness Test Application',
                'Company Registration & Renewal',
                'Driving License Application',
                'Attestation Services',
                'Passport Renewal Services',
                'Translation Services',
                'Bank Account Opening Assistance'
            ]),
            'faqs' => json_encode([
                ['question' => 'What documents are required for an Emirates ID renewal?', 'answer' => 'You will need a valid passport, visa, and the expired Emirates ID.'],
                ['question' => 'How long does the visa renewal process take?', 'answer' => 'The visa renewal process typically takes 2-5 working days.'],
                ['question' => 'Do you offer translation services for legal documents?', 'answer' => 'Yes, we provide certified translation services for legal documents.'],
                ['question' => 'Can I apply for a family visa at your center?', 'answer' => 'Yes, we assist with family visa applications for your spouse and children.'],
                ['question' => 'What are your operating hours?', 'answer' => 'We are open from 9 AM to 6 PM, Sunday to Thursday.']
            ]),
        ]);
        
        
    }
}
