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
            $iconFile = $request->file('company_icon');
            $iconPath = public_path('build/uploads/icons');
            $iconName = time() . '_' . $iconFile->getClientOriginalName();
            $iconFile->move($iconPath, $iconName);
            $settings->company_icon = 'build/uploads/icons/' . $iconName;
        }
        if ($request->hasFile('company_logo')) {
            $logoFile = $request->file('company_logo');
            $logoPath = public_path('build/uploads/logos');
            $logoName = time() . '_' . $logoFile->getClientOriginalName();
            $logoFile->move($logoPath, $logoName);
            $settings->company_logo = 'build/uploads/logos/' . $logoName;
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
