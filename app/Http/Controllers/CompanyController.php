<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    }
}
