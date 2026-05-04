<?php

namespace App\Http\Controllers;

use App\Mail\Confirmation;
use App\Models\Enquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewEnquiryController extends Controller
{
    public function create()
    {
        $services = ['Strategy & Planning', 'Operations', 'HR & People', 'Finance'];

        return view('enquiry.new', [
            'services' => $services,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable',
            'service' => 'required',
            'description' => 'required',
        ]);
        $enquiry = Enquiry::create($request->all());

        Mail::to($enquiry->email)->send(new Confirmation($enquiry));

        return redirect()->route('admin.index')
            ->with('success', 'Enquiry saved');
    }
}
