<?php

namespace App\Http\Controllers;

use App\Models\Etude;
use App\Models\Ratio;
use App\Models\Societe;
use Illuminate\View\View;
use Illuminate\Http\Request;

class SocieteController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $societes = Societe::all();

        return view('societes.index',compact('societes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('societes.create');
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
            'name' => 'required',
        ]);

        $Societe = Societe::create($request->all());

        return redirect()->route('societes.index')->with('success',"Création de sociéte réussi !");
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $societe = Societe::find($id);
        return view('societes.show',compact('societe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $societe = Societe::find($id);
        return view('societes.edit', ['societe' => $societe]);
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
        $societe = Societe::findOrFail($id);
        $societe->update($request->all());

        /*$update = [
                'name' => $request->name, 
                'sigle' => $request->sigle, 
                'description' => $request->description
            ];
        Product::where('id',$id)->update($update);*/

        return redirect()->route('societes.index')->with('success',"Modification de sociéte réussi !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Societe::where('id',$id)->delete();
        return redirect()->route('societes.index')->with('success',"Suppression de sociéte réussi !");
    }


    public function etudes($id) 
    {
        $etudes = Etude::where('societe_id', $id)
                ->with('societe')
                ->with('ratio')
                ->get();
        
        $societe = Societe::find($id);
        $ratios = Ratio::pluck('name','id');
        
        return view('societes.etudes',compact('etudes','societe','ratios'));
    }

    public function etudesSave(Request $request) {


        $etude = Etude::create($request->all());

        $id = $request->societe_id;

        $etudes = Etude::where('societe_id', $id)
                ->with('societe')
                ->with('ratio')
                ->get();

        $html = view('societes.etudes-table', compact('etudes'))->render();

        return response()->json(['html' => $html]); 
    }


    public function portrait($id)
    {
        $societe = Societe::find($id);
        return view('societes.portrait',compact('societe'));
    }
    public function analysefondamentale($id)
    {
        $societe = Societe::find($id);
        return view('societes.analysefondamentale',compact('societe'));
    }
    public function analysetechnique($id)
    {
        $societe = Societe::find($id);
        return view('societes.analysetechnique',compact('societe'));
    }
    public function graphique($id)
    {
        $societe = Societe::find($id);
        return view('societes.graphique',compact('societe'));
    }
    public function synthese($id)
    {
        $societe = Societe::find($id);
        return view('societes.synthese',compact('societe'));
    }
}
