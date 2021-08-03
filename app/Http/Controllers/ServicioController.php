<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;
use App\Models\Servicio_detalle;
use App\Models\Responsable;
use App\Http\Requests\SaveServicioRequest;
use App\Http\Requests\SaveServicioResponsableRequest;
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
        if(isset($_GET["busqueda"])){
            $busqueda=$_GET["busqueda"];
            $total = DB::select('CALL SP_contarBusquedaServicios(?)',array($busqueda))[0]->cantidad;
        }
        else{
            $busqueda="";
            $total = Servicio::count();
        }
        /* Paginacion */
        $nroElement = 14;
        $nroPaginas = $total % $nroElement == 0 ? intdiv($total,$nroElement) : intdiv($total,$nroElement) + 1;
        $cantidadReg = $nroElement;
        $pag = 1;
        $inicio = 0; // El primer registro que se va a tomar para la paginacion
        /* En el caso que la pagina este determinada */
        if(isset($_GET["page"])){
            $pag = $_GET["page"];
            if($total % $nroElement != 0 && $pag==$nroPaginas){
                $cantidadReg = $total%$nroElement;
            }
            $inicio = ($pag-1) * $nroElement;
        }
        $servicios=DB::select('CALL SP_listarBusquedaServicios(?,?,?)',array($busqueda, $inicio, $cantidadReg));
        return view('servicios/index',['servicios'=>$servicios,'nroPaginas'=>$nroPaginas,'pag'=>$pag, 'busqueda'=>$busqueda]);
    }
    
    public function create()
    {
        $consulta=DB::select('CALL SP_autoId(?)',array('tservicio'));
        $ID=$consulta[0]->ID;
        $responsables=Responsable::select(['idresponsable','nombres','apellidos'])->get();
        return view('servicios/create',['ID'=>$ID,'responsables'=>$responsables]);
    }

    public function create_responsable()
    {
        $consulta = DB::select('CALL SP_autoId(?)',array('tservicio'));
        $ID = $consulta[0]->ID;
        $servicios = Servicio::select(['nombre'])->distinct()->get();
        $responsables = Responsable::select(['idresponsable','nombres','apellidos'])->get();
        return view('servicios/nuevo_responsable',['ID'=>$ID,'responsables'=>$responsables, 'servicios'=>$servicios]);
    }

    public function store(SaveServicioRequest $request)
    {
        Servicio::create($request->validated());
        Servicio_detalle::create($request->validated());
        return redirect()->route('servicios.index')->with('status','La información del servicio se guardó exitosamente');
    }
    public function store_responsable(SaveServicioResponsableRequest $request)
    {
        Servicio::create($request->validated());
        // Actualizamos la fecha_fin del anterior responsable
        $fecha_inicio = $_POST["fecha_inicio"];
        $nombre = $_POST["nombre"];
        $idservicio = $_POST["idservicio"];
        DB::select('CALL SP_actualizarFechaFinServicio(?,?,?)',array($fecha_inicio, $nombre, $idservicio));
        return redirect()->route('servicios.index')->with('status','La información del servicio se guardó exitosamente');
    }

    public function show(Servicio $servicio)
    {
        $responsable=Responsable::where('idresponsable',$servicio->idresponsable)->get()[0];
        $detalle=Servicio_detalle::where('idservicio',$servicio->idservicio)->get()[0];
        return view('servicios/show',['servicio'=>$servicio,'responsable'=>$responsable,'detalle'=>$detalle]);
    }

    public function edit(Servicio $servicio)
    {
        $responsables=Responsable::select(['idresponsable','nombres','apellidos'])->get();
        return view('servicios/edit',['servicio'=>$servicio,'responsables'=>$responsables]);
    }

    public function update(SaveServicioResponsableRequest $request, Servicio $servicio)
    {
        $servicio->update($request->validated());
        return redirect()->route('servicios.show',['servicio'=>$servicio])->with('status','La información del servicio se actualizó exitosamente');
    }

    public function destroy(Servicio $servicio)
    {
        $servicio->delete();
        return redirect()->route('servicios.index')->with('status','El servicio se eliminó exitosamente');
    }
}
