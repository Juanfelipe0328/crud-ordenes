<h1>Editar Orden</h1>
<form action="{{ route('ordenes.update', $orden->id) }}" method="POST">
    @csrf
    @method('PUT')
<!-- CAMPOS NO EDITABLES -->
<label>Cliente (No editable):</label>
<input type="text" value="{{ $orden->cliente->nombre ?? 'N/A' }}" disabled><br><br>
 
    <label>Usuario (No editable):</label>
<input type="text" value="{{ $orden->usuario->username ?? 'N/A' }}" disabled><br><br>
 
    <label>Código Orden (No editable):</label>
<input type="text" value="{{ $orden->codigo_orden }}" disabled><br><br>
 
    <label>Descripción (No editable):</label>
<textarea disabled>{{ $orden->descripcion }}</textarea><br><br>
 
    <!-- CAMPOS EDITABLES -->
<label>Tipo Servicio:</label>
<input type="text" name="tipo_servicio" value="{{ $orden->tipo_servicio }}" required><br><br>
 
    <label>Prioridad:</label>
<select name="prioridad" required>
<option value="Baja" {{ $orden->prioridad == 'Baja' ? 'selected' : '' }}>Baja</option>
<option value="Media" {{ $orden->prioridad == 'Media' ? 'selected' : '' }}>Media</option>
<option value="Alta" {{ $orden->prioridad == 'Alta' ? 'selected' : '' }}>Alta</option>
<option value="Urgente" {{ $orden->prioridad == 'Urgente' ? 'selected' : '' }}>Urgente</option>
</select><br><br>
 
    <label>Estado:</label>
<select name="estado" required>
<option value="Pendiente" {{ $orden->estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
<option value="En Proceso" {{ $orden->estado == 'En Proceso' ? 'selected' : '' }}>En Proceso</option>
<option value="Cerrada" {{ $orden->estado == 'Cerrada' ? 'selected' : '' }}>Cerrada</option>
<option value="Cancelada" {{ $orden->estado == 'Cancelada' ? 'selected' : '' }}>Cancelada</option>
</select><br><br>
 
    <label>Fecha de Cierre Estimada:</label>
<input type="date" name="fecha_cierre_estimada" value="{{ $orden->fecha_cierre_estimada }}"><br><br>
 
    <button type="submit">Actualizar Orden</button>
</form> 