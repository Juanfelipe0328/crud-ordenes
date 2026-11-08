<?php
 
namespace App\Http\Controllers;
 
use App\Models\OrdenDeServicio;
use App\Models\Cliente;
use App\Models\Usuario;
use Illuminate\Http\Request;
 
class OrdenDeServicioController extends Controller
{
    public function index()
    {
        $ordenes = OrdenDeServicio::with(['cliente', 'usuario'])->get();
        return view('ordenes.index', compact('ordenes'));
    }
 
    public function create()
    {
        $clientes = Cliente::all(); 
        $usuarios = Usuario::all(); 
        return view('ordenes.create', compact('clientes', 'usuarios'));
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required',
            'usuario_id' => 'required',
            'codigo_orden' => 'required|unique:orden_de_servicio,codigo_orden',
            'descripcion' => 'required',
            'tipo_servicio' => 'required',
            'prioridad' => 'required|in:Baja,Media,Alta,Urgente',
        ]);
 
        OrdenDeServicio::create($request->all());
        return redirect()->route('ordenes.index');
    }
 
    public function edit($id)
    {
        $orden = OrdenDeServicio::findOrFail($id);
        return view('ordenes.edit', compact('orden'));
    }
 
    public function update(Request $request, $id)
    {
        $orden = OrdenDeServicio::findOrFail($id);
 
        $request->validate([
            'tipo_servicio' => 'required',
            'prioridad' => 'required|in:Baja,Media,Alta,Urgente',
            'estado' => 'required|in:Pendiente,En Proceso,Cerrada,Cancelada',
            'fecha_cierre_estimada' => 'nullable|date',
        ]);
 
        $orden->update($request->only([
            'tipo_servicio', 'prioridad', 'estado', 'fecha_cierre_estimada'
        ]));
 
        return redirect()->route('ordenes.index');
    }
}