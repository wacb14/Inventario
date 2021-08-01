<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bien;
use App\Models\Servicio;
use App\Http\Requests\SaveBienRequest;
use App\Http\Requests\UpdateBienRequest;
use DB;

class BienController extends Controller
{
    public function index(){
        /* Comprobamos las variables para la vista */
        if(isset($_GET["busqueda"]))
            $busqueda=$_GET["busqueda"];
        else
            $busqueda="";
            
        if(isset($_GET["tipo_listado"])){
            $tipo_listado=$_GET['tipo_listado'];
            switch($tipo_listado){
                case "FUNCIONAL":
                    $total = DB::select('CALL SP_contarBusquedaBienes(?,?)',array($busqueda, "FUNCIONAL"))[0]->cantidad;
                    break;
                case "BAJA":
                    $total = DB::select('CALL SP_contarBusquedaBienes(?,?)',array($busqueda, "BAJA"))[0]->cantidad;
                    break;
                case "TODO":
                    $total = DB::select('CALL SP_contarBusquedaBienes(?,?)',array($busqueda, ""))[0]->cantidad;
                    break;
            }
        }
        else{
            // Valores por defecto
            $tipo_listado="FUNCIONAL";
            $total = DB::select('CALL SP_contarBusquedaBienes(?,?)',array($busqueda, "FUNCIONAL"))[0]->cantidad;
        }
        /* Paginacion */
        $nroElement = 14;
        $nroPaginas = $total%$nroElement==0?intdiv($total,$nroElement):intdiv($total,$nroElement)+1;
        $cantidadReg = $nroElement;
        $pag=1;
        $inicio = 0; // El primer registro que se va a tomar para la paginacion

        /* Obtenemos el numero de pagina */
        if(isset($_GET["page"])){
            $pag=$_GET["page"];
            // En caso de que existan residuos
            if($total%$nroElement!=0 && $pag==$nroPaginas){
                $cantidadReg = $total%$nroElement;
            }
            // El inicio en base al numero de página
            $inicio=($pag-1)*$nroElement;
        }
        $bienes = DB::select('CALL SP_listarBusquedaBienes(?,?,?,?)',array($busqueda, $inicio, $cantidadReg, $tipo_listado=="TODO"?"":$tipo_listado));
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

    public function update(Bien $bien, UpdateBienRequest $request){
        $bien->update($request->validated());
        return redirect()->route('bienes.show',$bien)->with('status','La información del bien se actualizó exitosamente');
    }

    public function destroy(Bien $bien){
        $bien->delete();
        return redirect()->route('bienes.index')->with('status','El bien se eliminó exitosamente');
    }
}
