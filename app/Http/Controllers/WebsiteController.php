<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebsiteSetup;
use App\Models\Company;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Mime\Part\TextPart;

class WebsiteController extends Controller
{
    public function index()
    {
        $websiteSetup = WebsiteSetup::first();
        $company = Company::first();
        return view('website.index', compact('websiteSetup', 'company'));
    }
    


    public function customerSendEmail(Request $request) {
        try {
            $data = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email',
                'subject' => 'required|string',
                'message' => 'required|string',
            ]);
    
            $company = Company::first();
    
            Mail::send([], [], function ($message) use ($data, $company) {
                $message->to($company->email)
                        ->subject($data['subject'])
                        ->setBody(new TextPart('Name: ' . $data['name'] . '<br>Email: ' . $data['email'] . '<br>Message: ' . $data['message'], 'text/html'));
            });
    
            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            Log::error('Error sending email: ' . $e->getMessage()); // Log error message
            return response()->json(['status' => 'error', 'message' => 'An error occurred, please try again later.']);
        }
    }


}
