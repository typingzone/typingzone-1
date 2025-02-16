<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('user')->orderBy('created_at', 'desc')->get();
        return view('pages.services.services', compact('services'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'service_name' => 'required|string|max:255',
            'govt_cost' => 'required|numeric',
            'service_cost' => 'required|numeric',
        ]);
        $service = new Service();
        $service->user_id = Auth::id();
        $service->service_name = $validatedData['service_name'];
        $service->govt_cost = $validatedData['govt_cost'];
        $service->service_cost = $validatedData['service_cost'];
        $service->save();
        return response()->json(['message' => 'Service added successfully']);
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return response()->json(['message' => 'Service deleted successfully']);
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return response()->json($service);
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $service->update($request->all());
        return response()->json(['message' => 'Service updated successfully']);
    }

    public function getServiceCosts($serviceId)
    {
        $service = Service::findOrFail($serviceId);
        return response()->json([
            'govt_cost' => $service->govt_cost,
            'service_cost' => $service->service_cost
        ]);
    }


}
