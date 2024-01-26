<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewContact;

class LeadController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $mailData = $request->all();
        $validator = Validator::make($mailData, [
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'message' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        $newLead = new Lead();
        $newLead->fill($mailData);
        $newLead->save();

        Mail::to('matteo.tuveri16@gmail.com')->send(new NewContact($newLead));

        return response()->json([
                'success' => true

        ]);
    }

}
