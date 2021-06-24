<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;
use App\Models\Responsable;
use App\Http\Requests\SaveServicioRequest;
use DB;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* Paginacion */
        $total = Servicio::count();
        $nroElement = 14;
        $nroPaginas = $total%$nroElement==0?intdiv($total,$nroElement):intdiv($total,$nroElement)+1;
        $cantidadReg = $nroElement;
        $pag=1;
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
            $servicios = DB::select('CALL SP_listarBusquedaServicios(?)',array($busqueda));
        }
        else
            $servicios=DB::select('CALL SP_listarServiciosResponsable(?,?)',array($inicio,$cantidadReg));
        return view('servicios/index',['servicios'=>$servicios,'nroPaginas'=>$nroPaginas,'pag'=>$pag]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $consulta=DB::select('CALL SP_autoId(?)',array('tservicio'));
        $ID=$consulta[0]->ID;
        $responsables=Responsable::select(['idresponsable','nombres','apellidos'])->get();
        return view('servicios/create',['ID'=>$ID,'responsables'=>$responsables]);
    }

    public function store(SaveServicioRequest $request)
    {
        Servicio::create($request->validated());
        return redirect()->route('servicios.index')->with('status','La información del servicio se guardó exitosamente');
    }

    public function show(Servicio $servicio)
    {
        $responsable=Responsable::where('idresponsable',$servicio->idresponsable)->get()[0];
        return view('servicios/show',['servicio'=>$servicio,'responsable'=>$responsable]);
    }

    public function edit(Servicio $servicio)
    {
        $responsables=Responsable::select(['idresponsable','nombres','apellidos'])->get();
        return view('servicios/edit',['servicio'=>$servicio,'responsables'=>$responsables]);
    }

    public function update(SaveServicioRequest $request, Servicio $servicio)
    {
        $servicio->update($request->validated());
        return redirect()->route('servicios.show',['servicio'=>$servicio])->with('status','La información del servicio se actualizó exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servicio $servicio)
    {
        $servicio->delete();
        return redirect()->route('servicios.index')->with('status','El servicio se eliminó exitosamente');
    }
}
