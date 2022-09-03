<?php

namespace App\Http\Controllers;

use App\Models\contacto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required',
            'cmessage' => 'required',
        ]);

        $contacto = Contacto::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'subject' => $request['subject'],
            'cmessage' => $request['cmessage'],
        ]);

        Mail::send(
            'contact_email',
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'phone' => $request->get('phone'),
                'subject' => $request->get('subject'),
                'cmessage' => $request->get('cmessage'),
            ),
            function ($sending) use ($request) {
                $sending->from($request->email);
                $sending->to('ramirezmax.mr@gmail.com');
            }
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function show(contacto $contacto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function edit(contacto $contacto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contacto $contacto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function destroy(contacto $contacto)
    {
        //
    }
}
