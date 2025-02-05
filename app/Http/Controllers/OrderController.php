<?php

namespace App\Http\Controllers;

use ZipArchive;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Storage;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function showOrders()
    {
        $orders = Order::with(['user', 'assignedTo'])->get();
        return view('pages.orders.orders', compact('orders'));
    }



    public function storeOrder(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string',
            'phone_number' => 'required|string',
            'email' => 'required|email',
            'services' => 'required|array',
            'files' => 'nullable|array',
            'files.*' => 'nullable|file',
            'description' => 'nullable|string',
            'assign_to' => 'required|integer',
        ]);
    
        $files = [];
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $s3Path = Storage::disk('s3')->putFile('orders/attachments', $file);
                $filename = basename($s3Path);
                $files[] = $filename;
            }
        }
    
        $services = Service::whereIn('id', $request->services)->pluck('service_name')->toArray();
        $serviceNames = implode(', ', $services);
    
        Order::create([
            'user_id' => Auth::id(),
            'customer_name' => $request->customer_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'services' => $serviceNames,
            'files' => implode(', ', $files),
            'description' => $request->description,
            'assign_to' => $request->assign_to,
            'status' => 'pending',
        ]);
    
        return response()->json(['success' => true]);
    }
    
    

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $files = explode(', ', $order->files);
        foreach ($files as $file) {
            Storage::disk('s3')->delete('orders/attachments/' . $file);
        }
        $order->delete();
        return response()->json(['success' => true]);
    }
    

    public function downloadFiles($id)
    {
        $order = Order::findOrFail($id);
        $files = explode(', ', $order->files);
        
        $zip = new ZipArchive;
        $zipFileName = 'order_' . $id . '_files.zip';
        $zipFilePath = storage_path('app/public/' . $zipFileName);
        
        if ($zip->open($zipFilePath, ZipArchive::CREATE) === TRUE) {
            foreach ($files as $file) {
                $filePath = Storage::disk('s3')->url('orders/attachments/' . $file);
                $fileContent = file_get_contents($filePath);
                $zip->addFromString($file, $fileContent);
            }
            $zip->close();
            
            return response()->download($zipFilePath)->deleteFileAfterSend(true);
        }

        return response()->json(['error' => 'Failed to create ZIP file'], 500);
    }

}
