<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;

class ClientController extends Controller
{

    
    public function index(Request $request)
    {
        $clients = Client::when($request->search , function($q) use($request){

            return $q->where('name' , 'like' , '%' .$request->search . '%')
                   ->orWhere('phone' , 'like' , '%' . $request->search . '%')
                   ->orWhere('email' , 'like' , '%' . $request->search . '%');


        })->latest()->paginate(5);

        return view('dashboard.clients.index', compact('clients'));

    }//end of index

    public function create(){

        return view('dashboard.clients.create');

    }//end of create

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required',
            'address' => 'required',
        ]);

        $request_data = $request->all();

        Client::create($request_data);

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.clients.index');

    }//end of store

    public function edit(){

    }//end of edit

    public function update(){

    }//end of update


    public function destroy(){

    }//end of destroy

    
}//end of controller
