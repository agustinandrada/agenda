<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\Contact;

class StoreContact{
    public function handler($request){
        try{
            $validated = $this->validateData($request);
            Contact::create([
                'name'=> $validated['name'],
                'last_name'=>$validated['last_name'],
                'address'=>$validated['address'],
                'number'=>$validated['number'],
                'email'=>$validated['email'],
            ]);
            return true;
        }catch(ValidationException $e){
            throw $e;
        } catch (\Throwable $e) {
            \Log::error('Error al crear contacto: ' . $e->getMessage());
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
        ], [
            'name.required' => 'El nombre es requerido',
            'name.max' => 'Nombre demasiado largo',
            'last_name.required' => 'El apellido es requerido',
            'last_name.max' => 'Apellido demasiado largo',
            'email.required' => 'El email es obligatorio',
            'number.required' => 'Se necesita el telefono',
            'address.required' => 'Se necesita la dirección'
        ]);
    }
}
