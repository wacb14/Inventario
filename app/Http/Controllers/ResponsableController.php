<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Responsable;
use App\Http\Requests\SaveResponsableRequest;
use DB;

class ResponsableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* Paginacion */
        $total = Responsable::count();
        $nroElement = 14;
        $nroPaginas = $total%$nroElement==0?intdiv($total,$nroElement):intdiv($total,$nroElement)+1;
        $cantidadReg = $nroElement;
        $pag = 1;
        $inicio = 0; // El primer registro que se va a tomar para la paginacion
        /* En el caso que la pagina este determinada */
        if(isset($_GET["page"])){
            $pag=$_GET["page"];
            if($total%$nroElement!=0 && $pag==$nroPaginas){
                $cantidadReg = $total%$nroElement;
            }
            $inicio=($pag-1)*$nroElement;
        }
        if(isset($_GET["busqueda"])){
            $busqueda=$_GET["busqueda"];
            $responsables = DB::select('CALL SP_listarBusquedaResponsables(?)',array($busqueda));
            $total = count($responsables);
        }
        else
            $responsables = DB::select('CALL SP_listarResponsables(?,?)',array($inicio,$cantidadReg));
        return view('responsables/index', ['responsables'=>$responsables,'nroPaginas'=>$nroPaginas,'pag'=>$pag]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ID=DB::select('CALL SP_autoId(?)',array('tresponsable'))[0]->ID;
        return view('responsables/create',['ID'=>$ID]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveResponsableRequest $request)
    {
        Responsable::create($request->validated());
        return redirect()->route('responsables.index')->with('status','La información del responsable se guardó exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Responsable $responsable)
    {
        return view('responsables/show',['responsable'=>$responsable]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Responsable $responsable)
    {
        return view('responsables/edit',['responsable'=>$responsable]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveResponsableRequest $request, Responsable $responsable)
    {
        $responsable->update($request->validated());
        return redirect()->route('responsables.show',['responsable'=>$responsable])->with('status','La información del responsable se modificó exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Responsable $responsable)
    {
        $responsable->delete();
        return redirect()->route('responsables.index')->with('status','El responsable se eliminó exitosamente');
    }
}
