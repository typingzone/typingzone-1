<?php

namespace App\Services;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CompanyService
{
    public function updateCompanyProfile($request)
    {
        try {
            $settings = Company::first();
            if (!$settings) {
                $settings = new Company();
            }
            if ($request->hasFile('company_icon')) {
                $settings->company_icon = $request->file('company_icon')->store('uploads/icons', 'public');
            }
            if ($request->hasFile('company_logo')) {
                $settings->company_logo = $request->file('company_logo')->store('uploads/logos', 'public');
            }
            $settings->company_name = $request->input('company_name');
            $settings->address = $request->input('company_address');
            $settings->phone = $request->input('company_phone');
            $settings->email = $request->input('company_email');
            $settings->save();
            return $settings;

        } catch (\Exception $e) {
            Log::error('Error updating company settings: ' . $e->getMessage(), [
                'exception' => $e
            ]);
            throw $e;
        }
    }
}
