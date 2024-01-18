@section('title', __('Publicaciones cientificas'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Publicaciones científicas</h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar Publicaciones">
						</div>
						<div class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#createDataModal">
						<i class="fa fa-plus"></i>  Añadir Publicaciones
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.publicacioncientificas.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Doi</th>
								<th>Titulo</th>
								<th>Anio</th>
								<th>Ies</th>
								<th>Autor</th>
								<th>Docente</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@forelse($publicacioncientificas as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->doi }}</td>
								<td>{{ $row->titulo }}</td>
								<td>{{ $row->anio }}</td>
								<td>{{ $row->ies }}</td>
								<td>{{ $row->autor }}</td>
								<td>{{ $row->docente->nombre }} {{ $row->docente->apellido }}</td>
								<td width="90">
									<div class="dropdown">
										<a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
											Actions
										</a>
										<ul class="dropdown-menu">
											<li><a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a></li>
											<li><a class="dropdown-item" onclick="confirm('Confirm Delete Publicacioncientifica id {{$row->id}}? \nDeleted Publicacioncientificas cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a></li>  
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
					<div class="float-end">{{ $publicacioncientificas->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>