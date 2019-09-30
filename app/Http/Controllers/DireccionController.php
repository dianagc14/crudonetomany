<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Direccion;
use App\Usuario;

class DireccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $direcions=Direccion::orderBy('id','DESC')->paginate(3);
        return view('Direccion.index',compact('direccions'));

        $direccions=Direccion::table('direccions')
        ->join('usuarios','usuarios.id_usuario','=','direccions.id')
        ->select('direccions.id','usuarios.id_usuario','usuarios.nombre','usuarios.apellidopaterno','usuarios.apellidomaterno','usuarios.edad','direccions.calle','direccions.colonia','direccions.delegacion','direccions.numero');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuario=Usuario::orderBy('id','DESC')->get();
        return view('Direccion.create', compact('usuario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[ 'calle'=>'required', 'colonia'=>'required', 'delegacion'=>'required', 'numero'=>'required']);
        
        
        $direccion = new Direccion;
        $direccion->calle = $request->calle;
        $direccion->colonia = $request->colonia;
        $direccion->delegacion = $request->delegacion;
        $direccion->numero = $request->numero;
        $direccion->usuario_id=$request->usuario_id;
        $direccion->save();
        



        
        #Direccion::create($request->all());
        
       
        return redirect()->route('Direccion.index')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $direccions=Direccion::find($id);
        return  view('Direccion.show',compact('direccions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $direccion=direccion::find($id);
        return view('Direccion.edit',compact('direccion'));
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
        $this->validate($request,[ 'calle'=>'required', 'colonia'=>'required', 'delegacion'=>'required', 'numero'=>'required']);
 
        direccion::find($id)->update($request->all());
        return redirect()->route('direccion.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Direccion::find($id)->delete();
        return redirect()->route('direccion.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
