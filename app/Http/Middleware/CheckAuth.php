<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;

class CheckAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login'); 
        }
        if ($request->route()->getName() === 'general-settings') {
            return $next($request);
        }
        $company = Company::first();
        $requiredFields = [
            'company_logo' => 'Company Logo',
            'company_name' => 'Company Name',
            'email' => 'Email Address',
            'phone' => 'Phone Number',
            'address' => 'Company Address'
        ];
        $missingFields = [];
        foreach ($requiredFields as $field => $label) {
            if (empty($company->$field)) {
                $missingFields[] = $label;
            }
        }
        if (!empty($missingFields)) {
            $count = count($missingFields);
            if ($count === 1) {
                $message = "Please add your " . $missingFields[0] . " in company setting";
            } elseif ($count === 2) {
                $message = "Please add your " . $missingFields[0] . " and " . $missingFields[1] . " in company setting";
            } else {
                $lastField = array_pop($missingFields);
                $message = "Please add your " . implode(', ', $missingFields) . ", and " . $lastField . " in company setting";
            }
            return redirect()->route('general-settings')->with('info', $message);
        }
        return $next($request);
    }
}