<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the nerds
        $clients = Client::all();

        return view('client/index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('client/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $input = $request->all();
        // echo "<pre>";
        // print_r($input);
        // exit;
        $validator = Validator::make($input, [
            'name' => 'required|max:255',
            'email' => 'required|unique:clients',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('clients/add')
                        ->withErrors($validator)
                        ->withInput();
        }else{
            Client::create($input);
            Session::flash('flash_message', 'Client successfully added!');
            return redirect('clients');
        }

        
        return view('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show($id, Client $client)
    {
        $client = Client::find($id);

        return view('client/view',compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Client $client)
    {
        $client = Client::find($id);

        return view('client/edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client, $id)
    {
        $input = $request->all();
        // echo "<pre>";
        // print_r($input);
        // exit;
        $validator = Validator::make($input, [
            'name' => 'required|max:255',
            'email' => 'required|unique:clients,email,'.$id,
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('clients/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();
        }else{
            Client::find($id)->update($input);
            Session::flash('flash_message', 'Client successfully updated!');
            return redirect('clients');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Client $client)
    {
        $user = Client::findorfail($id);
        $user->delete();

        Session::flash('flash_message', 'Client successfully deleted!');
        return redirect('clients');
    }
}
