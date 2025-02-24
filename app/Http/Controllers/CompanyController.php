<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use Illuminate\Support\Facades\Storage;
use App\Models\Company;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    public function index()
    {
        return view('company.index', compact('company'));
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
=======
use App\Services\CompanyService;
use Illuminate\Support\Facades\Log;
use App\Models\Company;

class CompanyController extends Controller
{
    protected $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function index()
    {
        $company = Company::first();
        return view('pages.settings.general-settings', compact('company'));
    }

    public function updateCompanyProfile(Request $request)
    {
        try {
            $this->companyService->updateCompanyProfile($request);
            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            Log::error('Error in updating company settings: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Something went wrong.']);
        }
    }

    public function help()
    {
        return view('pages.settings.help');
>>>>>>> 023abcbfc092666fd811ecc2b6e7e0a49bdf5ac0
    }
}
