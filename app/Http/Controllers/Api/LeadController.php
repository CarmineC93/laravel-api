<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => ['required', 'max:150'],
            'email' => ['required', 'email', 'max:150'],
            'message' => ['required']
        ]);

        // se la validazione non va a buon fine viene mandato un errore
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        //salvataggio nel database del nuovo contatto
        $new_lead = new Lead();
        $new_lead->fill($data);
        $new_lead->save();

        //inviamo la mail
        Mail::to('info@myprojects.com')->send(new NewContact($new_lead));

        return response()->json([
            'success' => true
        ]);
    }
}
