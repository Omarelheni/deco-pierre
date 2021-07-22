<?php

namespace App\Http\Controllers;

use App\Models\Message ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mesgs = Message::all();
        return view ('messages',['mesgs'=>$mesgs,'utilisateur'=>Auth::user()]);
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
            'email' => 'required|string|email|max:255',
            'sujet'=>'required|string|max:255',
            'message'=>'required|string'
        ]);

        Message::create([
            'email'=>$this->email,
            'sujet'=>$this->sujet,
            'contenu'=>$this->message
        ]);
        return redirect()->route('accueil');
    }
    public function savemessage(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'sujet'=>'required|string|max:255',
            'message'=>'required|string'
        ]);

        Message::create([
            'email'=>$request->email,
            'sujet'=>$request->sujet,
            'contenu'=>$request->message
        ]);
        return redirect('/accueil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $mesg = Message::findOrFail($id);

        $mesg->delete();

        return redirect()->route('messages.index')->with('success','le produit a été crée avec succes.');
    }
}
