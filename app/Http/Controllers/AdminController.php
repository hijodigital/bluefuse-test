<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $enquiries = Enquiry::latest()->get();

        return view('admin.index', [
            'enquiries' => $enquiries,
        ]);
    }

    public function show($id)
    {
        $enquiry = Enquiry::find($id);

        return view('admin.view', ['enquiry' => $enquiry]);
    }

    public function updateStatus(Request $request, $id)
    {
        $enquiry = Enquiry::find($id);
        $enquiry->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status updated.');
    }
}
