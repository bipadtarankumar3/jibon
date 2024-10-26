<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BrrowersAddress;
use App\Models\BrrowersLoanDetails;
use App\Models\Documents;
use App\Models\User;
use Illuminate\Http\Request;

class BrrowersController extends Controller
{
    public function index()
    {
        return view('admin.pages.brrowers.index');
    }
    public function create()
    {
        return view('admin.pages.brrowers.create');
    }

    public function store(Request $request)
    {

       
        if (preg_match('/^data:image\/(\w+);base64,/', $request->profileimg, $type)) {
            $image = substr($request->profileimg, strpos($request->profileimg, ',') + 1);
            $image = base64_decode($image);

            // Create a unique filename for the profile image
            $profileImageName = uniqid() . '.jpg'; // Adjust file name and type as needed
            $profileImagePath = public_path('profile_images/' . $profileImageName);

            // Ensure the directory exists
            if (!file_exists(public_path('profile_images'))) {
                mkdir(public_path('profile_images'), 0755, true);
            }

            // Save the profile image
            file_put_contents($profileImagePath, $image);

            // Save the profile image path in the database

            $profile_image = 'profile_images/' . $profileImageName; // Save the relative path
        }
        $brrowers = User::create([
            'avater' => $profile_image,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'father_husband_name' => $request->father_husband_name,
            'gender' => $request->gender,
            'birth_date ' => $request->birth_date,
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
        foreach ($request->attachment_file as $file) {
            if ($file && $file->isValid()) {
                $milisecond = round(microtime(true) * 1000);
                $name = $file->getClientOriginalName();
                $actual_name = str_replace(" ", "_", $name);
                $uploadName = $milisecond . "_" . $actual_name;
                $file->move(public_path('upload'), $uploadName);

                $documentData[] = [
                    'image_name' => $uploadName,
                    'table_name' => $table_name,
                    'item_id' => $brrowers->id,
                    'document_type' => "attachment",
                ];

                Documents::insert($documentData);
            }
        }

        BrrowersAddress::create([
            'user_id' => $brrowers->id,
            'city'=>$request->city_village,
            'market'=>$request->market,
            'post_office'=>$request->post_office,
            'police_station'=>$request->police_station,
            'zip_code'=>$request->zipcode,
            'country'=>$request->country,
        ]);
        $loan_id=rand(000000000,99999999);
        BrrowersLoanDetails::create([
            'loan_id'=> $loan_id,
            'user_id'=> $brrowers->id,
            'market_id'=>$request->market,
            'loan_type_id'=>$request->loan_type,
            'principle_amount'=>$request->loan_type,
            'loan_terms'=>$request->loan_type,
            'days'=>$request->loan_type,
            'interest'=>$request->loan_type,
            'amortization'=>$request->loan_type,
            'total_amount'=>$request->loan_type,
            'note'=>$request->loan_type,
            'status'=>$request->loan_type,
        ]);

        $request->session()->flash('success','Added');
        return redirect()->back();

    }
}
