<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\Contact;

class UpdateContact{
    public function handler($request, $id){
        try{
            $validated = $this->validateData($request);
            $contact = Contact::where('id', $id)->first();

            $contact->name = $validated['name'];
            $contact->last_name = $validated['last_name'];
            $contact->email = $validated['email'];
            $contact->number = $validated['number'];
            $contact->address = $validated['address'];

            $contact->save();

            return true;
        }catch(ValidationException $e){
            throw $e;
        } catch (\Throwable $e) {
            \Log::error('Error al actualizar contacto: ' . $e->getMessage());
            return false;
        }
    }

    public function validateData($data){
        return $data->validate([
            'name'=>'required|max:20',
            'last_name'=>'required|max:20',
            'number'=>'required|max:15',
            'email'=>'required|email',
            'address'=>'required|max:100'
        ]);
    }
}
