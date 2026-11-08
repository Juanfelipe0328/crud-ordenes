<h1>Listado de Órdenes</h1>
<a href="{{ route('ordenes.create') }}">Crear Nueva Orden</a>
<table border="1" cellpadding="10">
<thead>
<tr>
<th>Código Orden</th>
<th>Cliente</th>
<th>Usuario</th>
<th>Descripción</th>
<th>Tipo Servicio</th>
<th>Prioridad</th>
<th>Estado</th>
<th>Cierre Estimado</th>
<th>Fecha Creación</th>
<th>Acciones</th>
</tr>
</thead>
<tbody>
        @foreach($ordenes as $orden)
<tr>
<td>{{ $orden->codigo_orden }}</td>
<!-- Ajusta los nombres de las columnas si en tus tablas cliente/usuario se llaman distinto -->
<td>{{ $orden->cliente->nombre ?? 'N/A' }}</td>
<td>{{ $orden->usuario->username ?? 'N/A' }}</td>
<td>{{ $orden->descripcion }}</td>
<td>{{ $orden->tipo_servicio }}</td>
<td>{{ $orden->prioridad }}</td>
<td>{{ $orden->estado }}</td>
<td>{{ $orden->fecha_cierre_estimada }}</td>
<td>{{ $orden->created_at }}</td>
<td>
<a href="{{ route('ordenes.edit', $orden->id) }}">Editar</a>
</td>
</tr>
        @endforeach
</tbody>
</table>