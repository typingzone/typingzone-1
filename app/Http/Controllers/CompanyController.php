<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Company;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    public function index()
    {
        return view('pages.settings.general-settings');
    }

    
    public function update(Request $request)
    {
        $company = Company::find(session('cmp'));
        if ($request->hasFile('logo')) {
            $uploadedLogo = $request->file('logo');
            $logoFileName = Str::random(20) . '.' . $uploadedLogo->getClientOriginalExtension(); 
            $logoFilePath = 'logos/' . $logoFileName;
            Storage::disk('s3')->put($logoFilePath, file_get_contents($uploadedLogo), 'public'); 
        }

        // Handle the icon upload
        if ($request->hasFile('icon')) {
            $uploadedIcon = $request->file('icon');
            $iconFileName = Str::random(20) . '.' . $uploadedIcon->getClientOriginalExtension(); 
            $iconFilePath = 'icons/' . $iconFileName;
            Storage::disk('s3')->put($iconFilePath, file_get_contents($uploadedIcon), 'public');
        }

        $company->name = $request->name;
        $company->save();

        // Return JSON response
        return response()->json([
            'status' => 'success',
            'message' => 'Company updated successfully.',
        ]);
    }
}
