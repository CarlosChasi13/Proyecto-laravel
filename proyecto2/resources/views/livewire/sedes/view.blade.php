@section('title', __('Sedes'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fas fa-building text-primary"></i>
							Sede</h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar Sede">
						</div>
						<div class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#createDataModal">
						<i class="fa fa-plus"></i>  Agregar Sede
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.sedes.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Nombre</th>
								<th>Telefono</th>
								<th>Email</th>
								<th>Direccion</th>
								<th>Ciudad</th>
								<th>Provincia</th>
								<th>Pais</th>
								<th>Maps Url</th>
								<td>ACCIONES	</td>
							</tr>
						</thead>
						<tbody>
							@forelse($sedes as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->nombre }}</td>
								<td>{{ $row->telefono }}</td>
								<td>{{ $row->email }}</td>
								<td>{{ $row->direccion }}</td>
								<td>{{ $row->ciudad }}</td>
								<td>{{ $row->provinciaop->nombre }}</td>
								<td>{{ $row->paisop->nombre}}</td>
								<td><a href="{{ $row->maps_url }}" target="_blank">{{ $row->maps_url }}</a></td>
								<td width="90">
									<div class="dropdown">
										<a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
											Acciones
										</a>
										<ul class="dropdown-menu">
											<li><a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a></li>
											<li><a class="dropdown-item" onclick="confirm('¿Desea eliminar la Sede {{$row->nombre}}? \n¡Las sedes eliminadas no pueden ser recuperadas!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar </a></li>  
										</ul>
									</div>								
								</td>
							</tr>
							@empty
							<tr>
								<td class="text-center" colspan="100%">Datos no encontrados</td>
							</tr>
							@endforelse
						</tbody>
					</table>						
					<div class="float-end">{{ $sedes->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>