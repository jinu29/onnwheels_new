<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Userkyc;

class KycController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // public function kycstore(Request $request)
    // {
    //     $form = new Userkyc();
    //     $form->user_id = auth()->user()->id;
    //     $form->aadhar = $request->aadhar;
    //     $form->pan = $request->pan;
    //     $form->license_front = $request->license_front;
    //     $form->license_back = $request->license_back;
    //     $form->save();

    //     return view('userprofile', compact('form'));
    // }

    public function kycstore(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'aadhar' => 'required|string',
            'pan' => 'required|string',
            'license_front' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'license_back' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Create a new Userkyc instance
        $form = new Userkyc();
        $form->user_id = auth()->user()->id;
        $form->aadhar = $request->aadhar;
        $form->pan = $request->pan;

        // Handle image uploads
        if ($request->hasFile('license_front')) {
            $licenseFront = $request->file('license_front');
            $licenseFrontName = time() . '_front.' . $licenseFront->getClientOriginalExtension();

            $licenseFront->move(public_path('assets/kyc/'), $licenseFrontName);
            $form->license_front = $licenseFrontName;
        }

        if ($request->hasFile('license_back')) {
            $licenseBack = $request->file('license_back');
            $licenseBackName = time() . '_back.' . $licenseBack->getClientOriginalExtension();
            $licenseBack->move(public_path('assets/kyc/'), $licenseBackName);
            $form->license_back = $licenseBackName;
        }

        // Save the form data to the database
        $form->save();

        // Redirect to the userprofile view with the form data
        return view('userprofile', compact('form'));
    }


    public function edit($id)
    {
        $form_id = decrypt($id);
        $form_data = Userkyc::findOrFail($form_id);
        return view('userprofile', compact('form_data'));
    }

    // public function update(Request $request, $id)
    // {

    //     // dd($request->all());

    //     $request->validate([
    //         'aadhar' => 'required|string',
    //         'pan' => 'required|string|unique:users,pan,' . $id,
    //         'license_front' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
    //         'license_back' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048'
    //     ]);

    //     $user = Userkyc::findOrFail($id);
    //     $user->aadhar = $request->aadhar;
    //     $user->pan = $request->pan;
    //     $user->license_front = $request->license_front;
    //     $user->license_back = $request->license_back;

    //     if ($request->hasFile('license_front')) {
    //         $licenseFront = $request->file('license_front');
    //         $licenseFrontName = time() . '_front.' . $licenseFront->getClientOriginalExtension();
    //         $licenseFront->move(public_path('assets/kyc/'), $licenseFrontName);
    //         $user->license_front = $licenseFrontName;
    //     }

    //     if ($request->hasFile('license_back')) {
    //         $licenseBack = $request->file('license_back');
    //         $licenseBackName = time() . '_back.' . $licenseBack->getClientOriginalExtension();
    //         $licenseBack->move(public_path('assets/kyc/'), $licenseBackName);
    //         $user->license_back = $licenseBackName;
    //     }

    //     $user->save();

    //     return redirect()->back()->with('success', 'User updated successfully.');
    // }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
     
        // Find the Userkyc record by ID
        $user = Userkyc::findOrFail($id);

        dd($user);

        // Update the user's Aadhar and PAN
        $user->aadhar = $request->aadhar;
        $user->pan = $request->pan;

        // Handle image uploads for license front and back
        if ($request->hasFile('license_front')) {
            $licenseFront = $request->file('license_front');
            $licenseFrontName = time() . '_front.' . $licenseFront->getClientOriginalExtension();
            dd($licenseFrontName);

            $licenseFront->move(public_path('assets/kyc/'), $licenseFrontName);
            $user->license_front = $licenseFrontName;
        }

        if ($request->hasFile('license_back')) {
            $licenseBack = $request->file('license_back');
            $licenseBackName = time() . '_back.' . $licenseBack->getClientOriginalExtension();
            $licenseBack->move(public_path('assets/kyc/'), $licenseBackName);
            $user->license_back = $licenseBackName;
        }

        // Save the updated userkyc record
        $user->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'User KYC updated successfully.');
    }



}
