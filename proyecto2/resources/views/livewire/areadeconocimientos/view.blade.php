<<<<<<< HEAD:proyecto2/resources/views/livewire/areadeconocimientos/view.blade.php
@section('title', __('Areadeconocimientos'))
=======
@section('title', __('Areas de conocimientos'))
>>>>>>> 5c9de0ab08d1111aa4f472e80291b0aa210fd56c:proyecto2/resources/views/livewire/areasconocimientos/view.blade.php
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
<<<<<<< HEAD:proyecto2/resources/views/livewire/areadeconocimientos/view.blade.php
							<h4><i class="fab fa-laravel text-info"></i>
							Areadeconocimiento Listing </h4>
=======
							<h4>
							<i class="fas fa-graduation-cap text-success" aria-hidden="true"></i>
							Áreas de conocimiento </h4>
>>>>>>> 69430cfd37a34485ab36f754f3e2e22d3235094d:proyecto2/resources/views/livewire/areasconocimientos/view.blade.php
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
<<<<<<< HEAD:proyecto2/resources/views/livewire/areadeconocimientos/view.blade.php
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Areadeconocimientos">
=======
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar Áreas">
>>>>>>> 5c9de0ab08d1111aa4f472e80291b0aa210fd56c:proyecto2/resources/views/livewire/areasconocimientos/view.blade.php
						</div>
						<div class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#createDataModal">
<<<<<<< HEAD:proyecto2/resources/views/livewire/areadeconocimientos/view.blade.php
						<i class="fa fa-plus"></i>  Add Areadeconocimientos
=======
						<i class="fa fa-plus"></i>  Add Areas de conocimiento
>>>>>>> 69430cfd37a34485ab36f754f3e2e22d3235094d:proyecto2/resources/views/livewire/areasconocimientos/view.blade.php
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.areadeconocimientos.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
<<<<<<< HEAD:proyecto2/resources/views/livewire/areadeconocimientos/view.blade.php
								<th>Id Docente</th>
								<th>Id Area</th>
								<td>ACTIONS</td>
=======
								<th>Docentes</th>
								<th>Area de Conocimiento</th>
								<td>ACCIONES</td>
>>>>>>> 5c9de0ab08d1111aa4f472e80291b0aa210fd56c:proyecto2/resources/views/livewire/areasconocimientos/view.blade.php
							</tr>
						</thead>
						<tbody>
							@forelse($areadeconocimientos as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
<<<<<<< HEAD:proyecto2/resources/views/livewire/areadeconocimientos/view.blade.php
								<td>{{ $row->id_docente }}</td>
								<td>{{ $row->id_area }}</td>
=======
								<td>{{ $row->docente->nombre }} {{ $row->docente->apellido }}</td>
								<td>{{ $row->areasconocimientosopcione->nombre}}</td>
>>>>>>> 5c9de0ab08d1111aa4f472e80291b0aa210fd56c:proyecto2/resources/views/livewire/areasconocimientos/view.blade.php
								<td width="90">
									<div class="dropdown">
										<a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
											Acciones
										</a>
										<ul class="dropdown-menu">
<<<<<<< HEAD:proyecto2/resources/views/livewire/areadeconocimientos/view.blade.php
											<li><a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a></li>
											<li><a class="dropdown-item" onclick="confirm('Confirm Delete Areadeconocimiento id {{$row->id}}? \nDeleted Areadeconocimientos cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a></li>  
=======
											<li><a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a></li>
											<li><a class="dropdown-item" onclick="confirm('Confirm Delete Areasconocimiento id {{$row->id}}? \nDeleted Areasconocimientos cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar </a></li>  
>>>>>>> 5c9de0ab08d1111aa4f472e80291b0aa210fd56c:proyecto2/resources/views/livewire/areasconocimientos/view.blade.php
										</ul>
									</div>								
								</td>
							</tr>
							@empty
							<tr>
								<td class="text-center" colspan="100%">No data Found </td>
							</tr>
							@endforelse
						</tbody>
					</table>						
					<div class="float-end">{{ $areadeconocimientos->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>