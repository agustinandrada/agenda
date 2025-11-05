<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\Contact;

class DeleteContact{
    public function handler($id){
        return Contact::where('id', $id)->delete();
    }
}
