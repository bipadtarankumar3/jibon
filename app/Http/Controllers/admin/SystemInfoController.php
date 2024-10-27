<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\SystemInfo;
use Illuminate\Support\Str;

class SystemInfoController extends Controller
{

    public function show()
    {
        $system_info = SystemInfo::first(); // Retrieve the first record
        return view('admin.pages.system_info', compact('system_info'));
       
    }

    public function save(Request $request)
    {
        // Validate form data
        $request->validate([
            'business_name' => 'required|string|max:255',
            'system_name' => 'required|string|max:255',
        ]);

        // Retrieve or create a new SystemInfo record
        $systemInfo = SystemInfo::firstOrNew();  // Fetch existing or create a new one

        // Assign form data
        $systemInfo->business_name = $request->input('business_name');
        $systemInfo->system_name = $request->input('system_name');
        $systemInfo->address = $request->input('address');
        $systemInfo->email = $request->input('email');
        $systemInfo->contact_number = $request->input('contact_number');
        $systemInfo->currency = $request->input('currency');

        if ($request->hasFile('logo1')) {
            $thumbnail = $request->file('logo1');
            $thumbnailName = Str::uuid() . '_' . $thumbnail->getClientOriginalName(); // Unique filename
            $logo1Path = '/images/system_info/' . $thumbnailName; // Adjust path as needed
            $thumbnail->move(public_path('images/system_info'), $thumbnailName); // Save the uploaded file
            $systemInfo->logo_1 = $logo1Path;
        }

        if ($request->hasFile('logo2')) {
            $thumbnail = $request->file('logo2');
            $thumbnailName = Str::uuid() . '_' . $thumbnail->getClientOriginalName(); // Unique filename
            $logo2Path = '/images/system_info/' . $thumbnailName; // Adjust path as needed
            $thumbnail->move(public_path('images/system_info'), $thumbnailName); // Save the uploaded file
            $systemInfo->logo_2 = $logo2Path;
        }

        // Save record
        $systemInfo->save();

        return response()->json(['success' => true]);
    }
}
