<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MobilePhones;

class MobilePhoneController extends Controller
{
    public function show($id)
{
    $mobilePhone = MobilePhones::findOrFail($id);
    return view('Supplier.show', compact('mobilePhone'));
}

public function edit($id)
{
    $mobilePhone = MobilePhones::findOrFail($id);
    return view('Supplier.edit', compact('mobilePhone'));
}

public function update(Request $request, $id)
{

    $mobilePhone = MobilePhones::findOrFail($id);


    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'brand' => 'required|string',
        'description' => 'required|string',
        'ram' => 'required|string',
        'storage' => 'required|string',
        'camera' => 'required|string',
        'display' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'price' => 'required|numeric',
        'quantity' => 'required|numeric',
        'availability' => 'boolean',
    ]);


    if ($request->hasFile('image')) {

        // Delete the old image if it exists
        if ($mobilePhone->image && \Storage::disk('public')->exists($mobilePhone->image)) {
            \Storage::disk('public')->delete($mobilePhone->image);
        }

        // Store the new image with a timestamped filename
        $filename = time() . '.' . $request->image->getClientOriginalExtension();
        $path = $request->image->storeAs('uploads/mobilephones', $filename, 'public');
        $validatedData['image'] = $path;
    } else {

        $validatedData['image'] = $mobilePhone->image;
    }


    try {
        $mobilePhone->update($validatedData);

        // Return back to the page with success message
       return redirect()->back()->with('message','Successfuly updated the record');


    } catch (\Exception $e) {
        // Log the error for debugging
        \Log::error('Mobile phone update error: ' . $e->getMessage());

        // Return an error response with the exception message
        return response()->json(['error' => 'Update failed: ' . $e->getMessage()], 500);
    }
}

//delete function

public function destroy($id)
{
    $mobilePhone = MobilePhones::findOrFail($id);

    try {
        // Delete the image if it exists
        if ($mobilePhone->image && \Storage::disk('public')->exists($mobilePhone->image)) {
            \Storage::disk('public')->delete($mobilePhone->image);
        }

        $mobilePhone->delete();

        // Return back to the page with success message
        return redirect()->back()->with('message','Successfuly deleted the record');

    } catch (\Exception $e) {
        // Log the error for debugging
        \Log::error('Mobile phone delete error: ' . $e->getMessage());

        // Return an error response with the exception message
        return response()->json(['error' => 'Delete failed: ' . $e->getMessage()], 500);
    }
}

//get mobile phones details to API and return as JSON
    public function customerIndex()
    {
        $mobilePhones = MobilePhones::all();

        return response()->json([
            'success' => true,
            'data' => $mobilePhones
        ]);
    }



}
