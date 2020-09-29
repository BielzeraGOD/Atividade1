<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autoe;

class AutoeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$autoe = new Autoe();
		$autoes = Autoe::All();
		
        return view("autoe.index", [
			"autoe" => $autoe,
			"autoes" => $autoes
		]);
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
		if ($request->get("id") == ""){
			$autoe = new Autoe();
		}else{
			$autoe = Autoe::find($request->get("id"));
		}
		$autoe->marca = $request->get("marca");
		$autoe->modelo = $request->get("modelo");
		$autoe->placa = $request->get("placa");
		$autoe->cor = $request->get("cor");
		$autoe->ano = $request->get("ano");
		$autoe->save();
		return redirect("/autoe");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $autoes = Autoe::ALL();
	   $autoe = Autoe::find($id);
	   return view("autoe.index", [
		"autoe" => $autoe,
		"autoes" => $autoes
	   ]);
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
		autoe::destroy($id);
		return redirect("/autoe");
    }
}
