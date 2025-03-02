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

    public function websiteSetup()
    {
        $websiteSetup = WebsiteSetup::first();
        return view('website.website_setup', compact('websiteSetup'));
    }
    
    public function updateWebsiteSetup(Request $request) 
    {
        $data = $request->validate([
            'welcome_message' => 'nullable|string',
            'about_us' => 'nullable|string',
            'our_services' => 'nullable|array',
            'faqs' => 'nullable|array',
            'cover_photo' => 'nullable|image|max:2048',
        ]);
        $websiteSetup = WebsiteSetup::first();
        $websiteSetup->welcome_message = $data['welcome_message'] ?? $websiteSetup->welcome_message;
        $websiteSetup->about_us = $data['about_us'] ?? $websiteSetup->about_us;
        $websiteSetup->our_services = $data['our_services'] ?? $websiteSetup->our_services;
        $websiteSetup->faqs = $data['faqs'] ?? $websiteSetup->faqs;
        if ($request->hasFile('cover_photo')) {
            if ($websiteSetup->cover_photo && file_exists(public_path($websiteSetup->cover_photo))) {
                unlink(public_path($websiteSetup->cover_photo));
            }
            $file = $request->file('cover_photo');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('build/website'), $fileName);
            $websiteSetup->cover_photo = 'build/website/' . $fileName;
        }            
        $websiteSetup->save();
        return redirect()->back()->with('success', 'Website setup updated successfully.');
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
