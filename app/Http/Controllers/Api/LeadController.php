<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Lead;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewContact;

class LeadController extends Controller
{
    public function store (Request $request) {
        $data = $request->all();

        $validator = Validator::make($data,[
            'name' => 'required',
            'email' => 'required|email',
            'content' => 'required'
       ]);

       if($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors' => $validator->errors()
        ]);
       }

     // salvo i dati nel database
       $new_lead = new Lead();
       $new_lead->fill($data);
       $new_lead->save();

    // invio la mail
       Mail::to('contact@boolfolio.com')->send(new NewContact($new_lead));

    // diamo una risposta all'utente
       return response()->json([
        'success' => true
       ]);
    }
}
