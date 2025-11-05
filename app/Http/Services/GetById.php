<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\Contact;

class GetById{
    public function handler($id){
        return $contacts = Contact::where('id', $id)->first();
    }
}
