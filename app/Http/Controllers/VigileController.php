<?php

namespace App\Http\Controllers;

use App\Models\Vigile;
use Illuminate\Http\Request;

class VigileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vigile = Vigile::all();
        return view('vigile_index', compact('vigile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('insertion_vigile');
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
            'prenom' => 'required',
            'dateNaissance' => 'required',
            'sexe' => 'required',
            'taille' => 'required',
            'poids' => 'required',
        ]);
        $vigile = new Vigile();
        $vigile->nom = $request->nom;
        $vigile->prenom = $request->prenom;
        $vigile->dateNaissance = $request->dateNaissance;
        $vigile->sexe = $request->sexe;
        $vigile->taille = $request->taille;
        $vigile->poids = $request->poids;

        $vigile->save();
        return redirect('/vigile')->with('status', 'vigile est ajoutée avec succé');
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
        $vigile = Vigile::findOrFail($id);
        return view('vigile_edit', compact('vigile'));
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
        $vigile = Vigile::find($id);
        $vigile->nom = $request->nom;
        $vigile->prenom = $request->prenom;
        $vigile->dateNaissance = $request->dateNaissance;
        $vigile->sexe = $request->sexe;
        $vigile->taille = $request->taille;
        $vigile->poids = $request->poids;
        $vigile->update();
        return redirect()->route('vigile_index')->with('success', 'vigile modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vigile = Vigile::find($id);
        $vigile->delete();
        return redirect()->route('vigile_index')->with('success', 'vigile supprimé');
    }
}
