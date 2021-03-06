<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movimiento;
use App\Models\Bien;
use App\Models\Servicio;
use App\Http\Requests\SaveMovimientoRequest;
use DB;

class MovimientoController extends Controller
{
    public function index(){
        /* Paginacion */
        $total = Movimiento::count();
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
            $movimientos = DB::select('CALL SP_listarBusquedaMovimientos(?)',array($busqueda));
        }
        else
            $movimientos=DB::select('CALL SP_listarMovimientosBienServicio(?,?)',array($inicio,$cantidadReg));
        return view('movimientos/index',['movimientos'=>$movimientos,'nroPaginas'=>$nroPaginas,'pag'=>$pag]);
    }
    public function create(){
        $consulta=DB::select('CALL SP_autoId(?)',array('tmovimiento'));
        $ID=$consulta[0]->ID;
        $bienes=Bien::select(['idbien','nombre'])->get();
        $servicios=Servicio::select(['idservicio','nombre'])->get();
        return view('movimientos/create',['ID'=>$ID,'bienes'=>$bienes,'servicios'=>$servicios]);
    }
    public function store(SaveMovimientoRequest $request){
        Movimiento::create($request->validated());
        return redirect()->route('movimientos.index')->with('status','La información del movimiento se guardó exitosamente');
    }
    public function show(Movimiento $movimiento){
        $bien=Bien::where('idbien',$movimiento->idbien)->get()[0];
        $servicio=Servicio::where('idservicio',$movimiento->idservicio)->get()[0];
        return view('movimientos/show',['movimiento'=>$movimiento,'bien'=>$bien,'servicio'=>$servicio]);
    }
    public function edit(Movimiento $movimiento){
        /*$consulta=DB::select('call SP_recuperarPorID(?)',array($idmovimiento));
        $movimiento=$consulta[0]; esta es la forma de llamar a un SP */
        $bienes=Bien::select(['idbien','nombre'])->get();
        $servicios=Servicio::select(['idservicio','nombre'])->get();
        return view('movimientos/edit',['movimiento'=>$movimiento,'bienes'=>$bienes,'servicios'=>$servicios]);
    }
    public function update(Movimiento $movimiento, SaveMovimientoRequest $request){
        $movimiento->update($request->validated());
        return redirect()->route('movimientos.show',$movimiento)->with('status','La información del movimiento se modificó exitosamente');
    }
    public function destroy(Movimiento $movimiento){
        $movimiento->delete();
        return redirect()->route('movimientos.index')->with('status','El movimiento se eliminó exitosamente');
    }
}