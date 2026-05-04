<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;

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
        Enquiry::create($request->all());

        return redirect()->route('admin.index')
            ->with('success', 'Enquiry saved');
    }
}
