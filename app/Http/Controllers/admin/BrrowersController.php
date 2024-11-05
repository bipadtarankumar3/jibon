<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BrrowersAddress;
use App\Models\BrrowersLoanDetails;
use App\Models\Documents;
use App\Models\LoanType;
use App\Models\Market;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class BrrowersController extends Controller
{
    // public function index()
    // {
    //     $brrowers = User::with(['documents', 'address', 'loanDetails']) // Eager load relationships
    //         ->where('user_type', "brrowers")
    //         ->orderBy('id', 'desc')
    //         ->get();

    //     return view('admin.pages.brrowers.index', compact('brrowers'));
    // }
    public function index()
    {
        $loanDetails = BrrowersLoanDetails::with(['user', 'market']) // Eager load related models
            ->whereHas('user', function ($query) {
                $query->where('user_type', 'brrowers');
                $query->where('status', 'process');
            })
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.pages.brrowers.index', compact('loanDetails'));
    }
    public function create()
    {
        $data['market'] = Market::orderBy('id', 'desc')->get();
        $data['loan_types'] = LoanType::orderBy('id', 'desc')->get();
        return view('admin.pages.brrowers.create', $data);
    }
    public function edit_brrower($id)
    {
        $data['market'] = Market::orderBy('id', 'desc')->get();
        $data['loan_types'] = LoanType::orderBy('id', 'desc')->get();
        $data['brrowers'] = BrrowersLoanDetails::where('id', $id)->with(['user', 'market', 'doucuments', 'address'])

            ->first();

        return view('admin.pages.brrowers.edit', $data);
    }

    public function brrowers_details($id)
    {
        $data['borrower'] = User::where('id', $id)
        ->where('user_type', 'brrowers')
        ->with(['addressDetails', 'documents'])
        ->first();

    $data['loanDetails'] = BrrowersLoanDetails::where('user_id', $id)
        ->with(['transactions'])
        ->get();
        return view('admin.pages.brrowers.brrowers_details', $data);
    }

    public function loantypedetails(Request $request)
    {
        $loantype = LoanType::where('id', $request->loanTypeId)->first();
        return response()->json($loantype);
    }


    public function approve(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'loan_detail_id' => 'required|exists:brrowers_loan_details,id',
            'approval_date' => 'required|date',
        ]);

        // Retrieve the loan details
        $loanDetails = BrrowersLoanDetails::findOrFail($request->loan_detail_id);

        // Parse the approval date
        $approvalDate = Carbon::parse($request->approval_date);

        // Calculate the maturity date based on the loan terms (in days)
        $maturityDate = $approvalDate->copy()->addDays($loanDetails->loan_terms);

        // Calculate the monthly EMI
        $total_amount = $loanDetails->total_amount;
        $loanTerms = $loanDetails->loan_terms;
        $perDayEMI = $total_amount / $loanTerms;

        // Update the loan details
        $loanDetails->update([
            'approve_date' => $approvalDate,
            'maturity_date' => $maturityDate,
            'status' => 'Approved',
        ]);

        // Create an array to hold EMI records
        $emiRecords = [];
        $remainingAmount = $total_amount;

        // Prepare EMI records for each day from the approval date to maturity date
        for ($i = 0; $i < $loanDetails->loan_terms; $i++) {
            $emiDate = $approvalDate->copy()->addDays($i); // Increment the date by i days

            // Deduct the per day EMI from the remaining amount
            $remainingAmount -= $perDayEMI;

            // Prepare EMI record
            $emiRecords[] = [
                'user_id' => $loanDetails->user_id,
                'loan_id' => $loanDetails->id,
                'market_id' => $loanDetails->market_id,
                'emi_date' => $emiDate->format('Y-m-d'),
                'emi_amount' => number_format($perDayEMI, 2),
                'remaining_amount' => round($remainingAmount, 2), // Round only at this stage
                'status' => 'due',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Perform a bulk insert of EMI records
        DB::table('emis')->insert($emiRecords);

        // Optionally, redirect back with a success message
        return redirect()->route('admin.brrowers.index')->with('success', 'Loan approved successfully!');
    }




    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'profileimg' => 'required|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
        ]);

        // if (preg_match('/^data:image\/(\w+);base64,/', $request->profileimg, $type)) {
        //     $image = substr($request->profileimg, strpos($request->profileimg, ',') + 1);
        //     $image = base64_decode($image);

        //     // Create a unique filename for the profile image
        //     $profileImageName = uniqid() . '.jpg'; // Adjust file name and type as needed
        //     $profileImagePath = public_path('profile_images/' . $profileImageName);

        //     // Ensure the directory exists
        //     if (!file_exists(public_path('profile_images'))) {
        //         mkdir(public_path('profile_images'), 0755, true);
        //     }

        //     // Save the profile image
        //     file_put_contents($profileImagePath, $image);

        //     // Save the profile image path in the database

        //     $profile_image = 'profile_images/' . $profileImageName; // Save the relative path
        // }

        // Process the Base64 image
        if ($request->has('profileimg')) {
            // Remove the "data:image/jpeg;base64," part if it exists
            $base64Str = preg_replace('#^data:image/\w+;base64,#i', '', $request->profileimg);

            // Decode the Base64 string
            $imageData = base64_decode($base64Str);

            // Generate a unique filename
            $profileImgName = Str::uuid() . '.jpg'; // or .jpeg

            // Define the path where you want to save the image
            $profileImgPath = public_path('images/profile_images/' . $profileImgName);

            // Check if the directory exists, if not, create it
            $directoryPath = public_path('images/profile_images');
            if (!File::exists($directoryPath)) {
                File::makeDirectory($directoryPath, 0755, true); // Create the directory with proper permissions
            }

            // Save the image to the specified path
            file_put_contents($profileImgPath, $imageData);

            // Save the path for later use
            $avatarPath = '/images/profile_images/' . $profileImgName; // Adjust path as needed
        }

        // dd($avatarPath);
        $avatarFilePath = null;
        // Handle the uploaded file if it exists
        if ($request->hasFile('avater_file')) {
            $thumbnail = $request->file('avater_file');
            $thumbnailName = Str::uuid() . '_' . $thumbnail->getClientOriginalName(); // Unique filename
            $avatarFilePath = '/images/avatar/' . $thumbnailName; // Adjust path as needed
            $thumbnail->move(public_path('images/avatar'), $thumbnailName); // Save the uploaded file
        }



        $firstName = strtolower($request->input('first_name'));
        $email = $firstName . '@jiban.com';
        $brrowers = User::create([
            'avater' => $avatarPath,
            'avater_file' => $avatarFilePath,
            'first_name' => $request->first_name,
            'user_type' => "brrowers",
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'father_husband_name' => $request->father_husband_name,
            'gender' => $request->gender,
            'email' =>  $email,
            'birth_date' => $request->birth_date,
            'contact_number' => $request->contact_number,
            'aadhar_no' => $request->aadhaar_number,
            'pan_no' => $request->pan_card_number,
            'voter_card_no' => $request->voter_card_number,
            'occupation' => $request->occupation,
            'occupation_address' => $request->occupation_address,
            'occupation_remarks' => $request->occupation_landmark,
            'remarks' => $request->remarks,


        ]);



        // Iterate over each file and upload it
        if (!empty($request->attachment_file) && is_array($request->attachment_file)) {
            foreach ($request->attachment_file as $file) {
                if ($file && $file->isValid()) {
                    $milisecond = round(microtime(true) * 1000);
                    $name = $file->getClientOriginalName();
                    $actual_name = str_replace(" ", "_", $name);
                    $uploadName = $milisecond . "_" . $actual_name;
                    $file->move(public_path('upload'), $uploadName);

                    $documentData[] = [
                        'image_name' => $uploadName,
                        'table_name' => "brrowers",
                        'item_id' => $brrowers->id,
                        'dcocument_type' => "attachment",
                    ];
                }
            }
            // Insert documents only once after collecting all data
            if (!empty($documentData)) {
                Documents::insert($documentData);
            }
        }


        BrrowersAddress::create([
            'user_id' => $brrowers->id,
            'city' => $request->city_village,
            'market' => $request->market,
            'post_office' => $request->post_office,
            'police_station' => $request->police_station,
            'zip_code' => $request->zipcode,
            'country' => $request->country,
        ]);
        // Retrieve the last loan entry
        $lastLoan = BrrowersLoanDetails::orderBy('id', 'desc')->first();

        // Initialize loan ID
        if ($lastLoan) {
            // Extract numeric part and increment it
            $lastId = (int)substr($lastLoan->loan_unique_id, 1);
            $newId = $lastId + 1;
        } else {
            // Start from 1 if there are no previous records
            $newId = 1;
        }

        // Format the new loan ID with the prefix 'L' and padding
        $loan_id = 'L' . str_pad($newId, 2, '0', STR_PAD_LEFT);

        // Insert the new loan record
        BrrowersLoanDetails::create([
            'loan_unique_id' => $loan_id,
            'user_id' => $brrowers->id,
            'market_id' => $request->market,
            'loan_type_id' => $request->loan_type,
            'principle_amount' => $request->principal_amount,
            'loan_terms' => $request->loan_terms,
            'days' => $request->loan_duration_unit,
            'interest' => $request->interest_rate,
            'amortization' => $request->amortization,
            'total_amount' => $request->total_loan_amount,
            'note' => $request->note,
            'status' => "process",
        ]);


        $request->session()->flash('success', 'Added');
        return redirect()->route('admin.brrowers.index');
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'profileimg' => 'nullable|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
        ]);

        // Find the existing user by ID
        $user = User::findOrFail($id);

        // Process the Base64 image for profile if provided
        if ($request->has('profileimg') && !empty($request->profileimg)) {
            $base64Str = preg_replace('#^data:image/\w+;base64,#i', '', $request->profileimg);
            $imageData = base64_decode($base64Str);
            $profileImgName = Str::uuid() . '.jpg';
            $profileImgPath = public_path('images/profile_images/' . $profileImgName);

            if (!File::exists(public_path('images/profile_images'))) {
                File::makeDirectory(public_path('images/profile_images'), 0755, true);
            }

            file_put_contents($profileImgPath, $imageData);
            $avatarPath = '/images/profile_images/' . $profileImgName;
            $user->avater = $avatarPath;
        }

        // Process the avatar file if provided
        if ($request->hasFile('avater_file') && !empty($request->avater_file)) {
            $thumbnail = $request->file('avater_file');
            $thumbnailName = Str::uuid() . '_' . $thumbnail->getClientOriginalName();
            $avatarFilePath = '/images/avatar/' . $thumbnailName;
            $thumbnail->move(public_path('images/avatar'), $thumbnailName);
            $user->avater_file = $avatarFilePath;
        }

        // Update basic user information
        $firstName = strtolower($request->input('first_name'));
        $email = $firstName . '@jiban.com';

        $user->update([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'father_husband_name' => $request->father_husband_name,
            'gender' => $request->gender,
            'email' => $email,
            'birth_date' => $request->birth_date,
            'contact_number' => $request->contact_number,
            'aadhar_no' => $request->aadhaar_number,
            'pan_no' => $request->pan_card_number,
            'voter_card_no' => $request->voter_card_number,
            'occupation' => $request->occupation,
            'occupation_address' => $request->occupation_address,
            'occupation_remarks' => $request->occupation_landmark,
            'remarks' => $request->remarks,
        ]);

        // Handle file attachments for the user
        $documentData = [];
        if ($request->has('attachment_file') && is_array($request->attachment_file)) {
            foreach ($request->attachment_file as $file) {
                if ($file && $file->isValid()) {
                    $uploadName = round(microtime(true) * 1000) . "_" . str_replace(" ", "_", $file->getClientOriginalName());
                    $file->move(public_path('upload'), $uploadName);

                    $documentData[] = [
                        'image_name' => $uploadName,
                        'table_name' => "brrowers",
                        'item_id' => $user->id,
                        'dcocument_type' => "attachment",
                    ];
                }
            }

            if (!empty($documentData)) {
                Documents::insert($documentData);
            }
        }

        // Update or create the address for the borrower
        BrrowersAddress::updateOrCreate(
            ['user_id' => $user->id],
            [
                'city' => $request->city_village,
                'market' => $request->market,
                'post_office' => $request->post_office,
                'police_station' => $request->police_station,
                'zip_code' => $request->zipcode,
                'country' => $request->country,
            ]
        );

        // Update or create loan details for the borrower
        $loan_id = rand(000000000, 99999999);
        BrrowersLoanDetails::updateOrCreate(
            ['user_id' => $user->id],
            [
                'loan_unique_id' => $loan_id,
                'market_id' => $request->market,
                'loan_type_id' => $request->loan_type,
                'principle_amount' => $request->principal_amount,
                'loan_terms' => $request->loan_terms,
                'days' => $request->loan_duration_unit,
                'interest' => $request->interest_rate,
                'amortization' => $request->amortization,
                'total_amount' => $request->total_loan_amount,
                'note' => $request->note,
                'status' => "process",
            ]
        );

        $request->session()->flash('success', 'Updated successfully');
        return redirect()->route('admin.brrowers.index');
    }
}
