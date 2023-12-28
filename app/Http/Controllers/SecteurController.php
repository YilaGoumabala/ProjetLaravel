<?php

namespace App\Http\Controllers;

use App\Models\Secteur;
use App\Models\Vigile;
use Illuminate\Http\Request;

class SecteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vigile = Vigile::all()->pluck('nom', 'id')->toArray();
        $secteur = Secteur::all();
        return view('secteur_index', compact('vigile', 'secteur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vigile = Vigile::all()->pluck('nom', 'id')->toArray();
        return view('secteur_insertion', compact('vigile'));
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
            'nom' => 'required',
            'superficie' => 'required',
            'vigiles_id' => 'required',

        ]);
        $secteur = new Secteur();
        $secteur->nom = $request->nom;
        $secteur->superficie = $request->superficie;
        $secteur->vigiles_id = $request->vigiles_id;


        $secteur->save();
        return redirect('/secteur')->with('status', 'secteur est ajoutée avec succé');
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
        $secteur = Vigile::findOrFail($id);
        return view('secteur.edit', compact('secteur'));
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

        $secteur = Secteur::find($id);
        $secteur->nom = $request->nom;
        $secteur->superficie = $request->superficie;
        $secteur->vigiles_id = $request->vigiles_id;

        $secteur->update();
        return redirect('/secteur')->with('success', 'secteur modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $secteur = Secteur::find($id);
        $secteur->delete();
        return redirect('/secteur')->with('success', 'secteur supprimé');
    }
}
