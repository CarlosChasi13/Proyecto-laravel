@section('title', __('Docentes'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fas fa-user-graduate text-success"></i>
							Docentes</h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar Docente">
						</div>
						<div class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#createDataModal">
						<i class="fa fa-plus"></i>  Agregar Docentes
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.docentes.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Cedula</th>
								<th>Nombre</th>
								<th>Apellido</th>
								<th>Fecha Nacimiento</th>
								<th>Genero</th>
								<th>Telefono</th>
								<th>Email</th>
								<th>Direccion</th>
								<th>Rol</th>
								<th>Acerca de</th>
								<th>Observaciones</th>
								<td>Acciones</td>
							</tr>
						</thead>
						<tbody>
							@forelse($docentes as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->cedula }}</td>
								<td>{{ $row->nombre }}</td>
								<td>{{ $row->apellido }}</td>
								<td>{{ $row->fecha_nacimiento }}</td>
								<td>{{ $row->genero->nombre }}</td>
								<td>{{ $row->telefono }}</td>
								<td>{{ $row->email }}</td>
								<td>{{ $row->direccion }}</td>
								<td>{{ $row->rol->nombre }}</td>
								<td>{{ $row->acercade }}</td>
								<td>{{ $row->observaciones }}</td>
								<td width="90">
									<div class="dropdown">
										<a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
											Acciones
											Acciones
										</a>
										<ul class="dropdown-menu">
											<li><a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a></li>
											<li><a class="dropdown-item" onclick="confirm('¿Seguro que desa eliminar al Docente {{$row->nombre}} {{$row->apellido}} ? \n!Los Docentes eliminados no pueden ser recuperados!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar</a></li>  
										</ul>
									</div>								
								</td>
							</tr>
							@empty
							<tr>
								<td class="text-center" colspan="100%">Datos no encontrados </td>
							</tr>
							@endforelse
						</tbody>
					</table>						
					<div class="float-end">{{ $docentes->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>