<?php

namespace App\Http\Controllers;

use App\Ubicacion;
use App\Http\Requests\UbicacionFormRequest;
use Illuminate\Http\Request;
use DB;
class UbicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
    
            $query=trim($request->get('searchText'));
            $ubicaciones=DB::table('ubicacions')->where('descripcion','LIKE','%'.$query.'%')
            ->orderby('id','desc')
            ->paginate(7);
            return view('Ubicacion.index',["ubicacion"=>$ubicaciones,"searchText"=>$query]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Ubicacion.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UbicacionFormRequest $request)
    {
        $ubicaciones= new Ubicacion;
        $ubicaciones->descripcion=$request->get('Descripcion');
        $ubicaciones->save();
        return redirect('Ubicacion');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ubicacion  $ubicacion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view ("Ubicacion.show",["ubicacion"=>Ubicacion::findOrFail($id)]);
    }

    public function edit( $id)
    {
        return view ("Ubicacion.edit",["ubicacion"=>Ubicacion::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ubicacion  $ubicacion
     * @return \Illuminate\Http\Response
     */
    public function update(UbicacionFormRequest $request, $id)
    {
        $ubicaciones=Ubicacion::findOrFail($id);
        $ubicaciones->descripcion=$request->get('descripcion');
        $ubicaciones->update();
        return redirect('Ubicacion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ubicacion  $ubicacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ubicaciones=Ubicacion::findOrFail($id);
    $ubicaciones->delete();
    return redirect('Ubicacion');
    }
}
