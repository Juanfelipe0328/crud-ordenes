<h1>Crear Orden</h1>
<form action="{{ route('ordenes.store') }}" method="POST">
    @csrf
<label>Cliente:</label>
<select name="cliente_id" required>
        @foreach($clientes as $cliente)
<option value="{{ $cliente->id_cliente }}">{{ $cliente->nombre }}</option>
        @endforeach
</select><br><br>
<label>Usuario Asignado:</label>
<select name="usuario_id" required>
        @foreach($usuarios as $usuario)
<option value="{{ $usuario->id_usuario }}">{{ $usuario->username }}</option>
        @endforeach
</select><br><br>
 
    <label>Código de Orden:</label>
<input type="text" name="codigo_orden" required><br><br>
 
    <label>Descripción:</label>
<textarea name="descripcion" required></textarea><br><br>
 
    <label>Tipo Servicio:</label>
<input type="text" name="tipo_servicio" required><br><br>
 
    <label>Prioridad:</label>
<select name="prioridad" required>
<option value="Baja">Baja</option>
<option value="Media" selected>Media</option>
<option value="Alta">Alta</option>
<option value="Urgente">Urgente</option>
</select><br><br>
 
    <button type="submit">Guardar Orden</button>
</form>