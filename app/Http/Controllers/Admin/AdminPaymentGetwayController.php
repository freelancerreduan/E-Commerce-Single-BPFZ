<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentGetway;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminPaymentGetwayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getways = PaymentGetway::all();
        return view('admin.getway.index', compact('getways'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.getway.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'account_name' => 'required | string | max:255 | unique:payment_getways',
            'account_number' => 'required | string | min:11 | max:11',
            'account_type' => 'required | string | max:255',
            'step' => 'required | string',
            'logo' => 'required | image | mimes:jpg,png,jpeg',
        ]);

        $file = $request->file('logo');
        $fileName = time().'-payment-getway.'.$file->getClientOriginalExtension();
        $path = 'uploads/';
        $request->logo->move($path, $fileName);

        PaymentGetway::insert([
            'account_name' => $request->account_name,
            'account_number' => $request->account_number,
            'account_type' => $request->account_type,
            'step' => $request->step,
            'logo' => $path.$fileName,
            'created_at' => Carbon::now()
        ]);
        return back()->with('success', 'Created Successfully');
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
    public function edit(string $id)
    {
        $getway = PaymentGetway::where('id', $id)->first();
        return view('admin.getway.edit', compact('getway'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $getway = PaymentGetway::where('id', $id)->first();
        $request->validate([
            'account_name' => 'required | string | max:255 | unique:payment_getways,account_name,'.$getway->id.',id',
            'account_number' => 'required | string | min:11 | max:11',
            'account_type' => 'required | string | max:255',
            'step' => 'required | string',
            'logo' => 'image | mimes:jpg,png,jpeg',
        ]);
        if ($request->hasFile('logo')) {
            unlink(base_path($getway->logo));
            $file = $request->file('logo');
            $fileName = time().'-payment-getway.'.$file->getClientOriginalExtension();
            $path = 'assets/uploads/';
            $request->logo->move($path, $fileName);
            $getway->update([
                'logo' => $path.$fileName,
            ]);
        }

        $getway->update([
            'account_name' => $request->account_name,
            'account_number' => $request->account_number,
            'account_type' => $request->account_type,
            'step' => $request->step,
        ]);
        return back()->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $getway = PaymentGetway::where('id', $id)->first();
        unlink(base_path($getway->logo));
        $getway->delete();
        return back()->with('success', 'Deleted Successfully');
    }
}
