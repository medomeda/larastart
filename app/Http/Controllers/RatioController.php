<?php

namespace App\Http\Controllers;

use App\Models\Ratio;
use Illuminate\Http\Request;

class RatioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ratios = Ratio::paginate(5);

        return view('ratios.index',compact('ratios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ratios.create');
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
            'name' => 'required|max:100',
            'abreviation' => 'required|max:100',
            'typeparam' => 'required',
        ]);

        $ratio = Ratio::create($request->all());

        return redirect()->route('ratios.index')->with('success',"Création de ratio réussi !");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ratio = Ratio::find($id);
        return view('ratios.show',compact('ratio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ratio = Ratio::find($id);
        return view('ratios.edit', ['ratio' => $ratio]);
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

        $request->validate([
            'name' => 'required|max:100',
            'abreviation' => 'required|max:100',
            'typeparam' => 'required',
        ]);

        $ratio = Ratio::findOrFail($id);
        $ratio->update($request->all());
        return redirect()->route('ratios.index')->with('success',"Modification de ratio réussi !");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ratio::where('id',$id)->delete();
        return redirect()->route('ratios.index')->with('success',"Suppression de ratio réussi !");

    }
}
