<?php

namespace App\Http\Controllers;

use ZipArchive;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Storage;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

class OrderController extends Controller
{
    public function showOrders()
    {
        $orders = Order::with(['user', 'assignedTo'])->orderBy('created_at', 'desc')->get();
        foreach ($orders as $order) {
            $serviceIds = is_string($order->services) ? explode(',', $order->services) : json_decode($order->services, true);
            $order->service_names = Service::whereIn('id', $serviceIds)->pluck('service_name')->toArray();
        }        
        return view('pages.orders.orders', compact('orders'));
    }


    public function archivedOrders()
    {
        return view('pages.orders.archived_orders');
    }



    public function storeOrder(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string',
            'phone_number' => 'nullable|string',
            'email' => 'nullable|email',
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
    
        $order = Order::create([
            'user_id' => Auth::id(),
            'customer_name' => $request->customer_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'services' => implode(', ', $request->services),
            'files' => implode(', ', $files),
            'description' => $request->description,
            'assign_to' => $request->assign_to,
            'status' => 'pending',
        ]);
        
        Notification::create([
            'assign_to' => $request->assign_to,
            'order_id' => $order->id, 
            'comment' => $request->customer_name . ' has been assigned to you for further processing.',
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




    public function getOrderServices($orderId)
    {
        $order = Order::findOrFail($orderId);
        $serviceIds = is_string($order->services) ? explode(',', $order->services) : json_decode($order->services, true);
        $services = Service::whereIn('id', $serviceIds)->get(['id', 'service_name']);
        return response()->json($services);
    }



    public function edit($id)
    {
        $order = Order::find($id);
        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }
        $order->service_ids = explode(', ', $order->services);
        $order->assign_to_id = $order->assignedTo ? $order->assignedTo->id : null;
        return response()->json($order);
    }
    
    

    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $order->update([
            'customer_name' => $request->customer_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'description' => $request->description,
            'services' => implode(', ', $request->services), 
        ]);
        if ($request->has('assign_to')) {
            $order->assignedTo()->associate(User::find($request->assign_to))->save();
        }    
        return redirect()->back()->with('success', 'Order updated successfully.');
    }
    
    

    public function allNotifications()
    {
        $notifications = Notification::where('assign_to', Auth::id())->with('order')->get();
        return view('pages.orders.all-notifications', compact('notifications'));
    }
    

    public function deleteNotification($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->delete();
        return response()->json(['success' => true]);
    }

    
    
}
