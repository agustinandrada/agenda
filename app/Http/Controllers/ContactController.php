<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\GetAll;
use App\Http\Services\GetById;
use App\Http\Services\StoreContact;
use App\Http\Services\UpdateContact;
use App\Http\Services\DeleteContact;

class ContactController extends Controller
{
    protected $getAll;
    protected $storeContact;
    protected $getById;
    protected $updateContact;
    protected $deleteContact;

     public function __construct(GetAll $getAll, StoreContact $storeContact, GetById $getById, UpdateContact $updateContact, DeleteContact $deleteContact)
    {
        $this->getAll = $getAll;
        $this->storeContact = $storeContact;
        $this->getById = $getById;
        $this->updateContact = $updateContact;
        $this->deleteContact = $deleteContact;
    }
    public function index(){
        $contacts = $this->getAll->handler();
        return view('index',compact('contacts'));
    }

    public function new(){
        return view('new');
    }

    public function store(Request $request){
        $data = $this->storeContact->handler($request);

        if($data){
            return redirect()->route('index')->with('success', 'Contacto Creado con Éxito!');
        }else{
           return redirect()->back()
                         ->with('error', 'Ocurrió un error al crear el contacto')
                         ->withInput();
        }
    }

    public function edit(Request $request){
        $query =$request->query->all();
        $id = $query['id'];
        $data = $this->getById->handler($id);
        return view('edit',compact('data'));
    }

     public function update(Request $request){
        $query =$request->query->all();
        $id = $query['id'];
        $data = $this->updateContact->handler($request, $id);
        if($data){
            $nombre = $request->name .' '. $request->last_name;
            return redirect()->route('index')->with('success', $nombre . ' ' .'actualizado con Éxito!');
        }else{
             return redirect()->back()
                         ->with('error', 'Ocurrió un error al crear el contacto')
                         ->withInput();
        }
    }

    public function delete(Request $request){
        $id = $request->id;
        $data = $this->deleteContact->handler($id);
        return redirect()->route('index')->with('success', 'Contacto Eliminado Con Éxito');
    }
}
