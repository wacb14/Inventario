<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bien;
use App\Models\Servicio;
use App\Http\Requests\SaveBienRequest;
use DB;

class BienController extends Controller
{
    public function index(){
        /* Paginacion */
        $total = Bien::count();
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
        if(isset($_GET["busqueda"]))
            $busqueda=$_GET["busqueda"];
        else
            $busqueda="";
        if(isset($_GET["tipo_listado"]))
            $tipo_listado=$_GET['tipo_listado']; 
        else
            $tipo_listado="";
        $bienes = DB::select('CALL SP_listarBusquedaBienes(?,?,?,?)',array($busqueda, $inicio, $cantidadReg, $tipo_listado));
        return view('bienes/index',['bienes'=>$bienes,'nroPaginas'=>$nroPaginas,'pag'=>$pag, 'busqueda'=>$busqueda,'tipo_listado'=>$tipo_listado]);
    }

    public function create(){
        $ID = DB::select('CALL SP_autoId(?)',array('tbien'))[0]->ID;
        $servicios = Servicio::select(['idservicio','nombre'])->get();
        return view('bienes/create',['servicios'=>$servicios,'ID'=>$ID]);
    }

    public function store(SaveBienRequest $request){
        Bien::create($request->validated());
        return redirect()->route('bienes.index')->with('status','La información del bien se guardó exitosamente');
    }

    public function show(Bien $bien){
        $servicio = Servicio::where('idservicio',$bien->idservicio)->get()[0];
        return view('bienes/show',['bien'=>$bien,'servicio'=>$servicio]);
    }

    public function edit(Bien $bien){
        /*$consulta=DB::select('call SP_recuperarPorID(?)',array($idbien));
        $bien=$consulta[0]; esta es la forma de llamar a un SP */
        $servicios = Servicio::select(['idservicio','nombre'])->get();
        return view('bienes/edit',['bien'=>$bien,'servicios'=>$servicios]);
    }

    public function update(Bien $bien, SaveBienRequest $request){
        $bien->update($request->validated());
        return redirect()->route('bienes.show',$bien)->with('status','La información del bien se actualizó exitosamente');
    }

    public function destroy(Bien $bien){
        $bien->delete();
        return redirect()->route('bienes.index')->with('status','El bien se eliminó exitosamente');
    }
}
