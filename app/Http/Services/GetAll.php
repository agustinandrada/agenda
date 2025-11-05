<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\Contact;

class GetAll{
    public function handler(){
        return $contacts = Contact::paginate(9);
    }
}
