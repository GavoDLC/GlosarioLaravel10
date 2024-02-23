<?php

namespace App\Http\Controllers;

use App\Models\Terminos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TerminosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        //variable y nombre de la variable que nos va a permitir tomas los datos desde el index
        //consultar los 5 primerps registros
        $datos['glosario']=Terminos::paginate(15);
        //redireccionar a la vista de index de la carpeta glosario
        return view('glosario.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //redireccionar a la vista de creacion de la carpeta de empleados
        return view('glosario.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //recibir todos los datos del formulario de creación
        //$datosRecibidos=request()->all();
        //quitar el token para enviar los datos
        $datosRecibidos=request()->except('_token');

        //validar la fotografia para que se agrague a la carpeta de uploads en la ruta public
        if($request->hasFile('Foto')){
            $datosRecibidos['Foto']=$request->file('Foto')->store('uploads','public');
        }


        //insertar los datos en la base de datos
        Terminos::insert($datosRecibidos);
        //enviar a la vista en un archivo json dentro del navegador para visualizar los datos dentro de un formulario.
        //return response()->json($datosRecibidos);
        return redirect('glosario')->with('mensaje', 'Registro agregado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Terminos $terminos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //recuperar los datos del termino
        $glosario=Terminos::findOrFail($id);

        return view('glosario.update',compact('glosario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //Recepcion de los datos
        $datosRecibidos=request()->except(['_token','_method']);

        if($request->hasFile('Foto')){
            $glosario=Terminos::findOrFail($id);

            Storage::delete('public/'.$glosario->Foto);

            $datosRecibidos['Foto']=$request->file('Foto')->store('uploads','public');
        }


        Terminos::where('id','=',$id)->update($datosRecibidos);
        //recuperar los datos del termino
        $glosario=Terminos::findOrFail($id);

        return view('glosario.update',compact('glosario'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //buscamos si la fotografia existe
        $glosario=Terminos::findOrFail($id);
        if(Storage::delete('public/'.$glosario->Foto)){
            

            Terminos::destroy($id);

        }
        return redirect('glosario')->with('mensaje','Registro eliminado');
    }
    
    
}
