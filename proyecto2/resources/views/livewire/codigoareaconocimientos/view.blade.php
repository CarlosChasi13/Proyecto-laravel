@section('title', __('Codigoareaconocimientos'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Código de Área de Conocimiento </h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar Área">
						</div>
						<div class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#createDataModal">
						<i class="fa fa-plus"></i>  Crear Código para Área de Conocimiento
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.codigoareaconocimientos.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Codigo</th>
								<th>Grado</th>
								<th>Área de conocimiento</th>
								<td>ACCIONES</td>
							</tr>
						</thead>
						<tbody>
							@forelse($codigoareaconocimientos as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->codigo }}</td>
								<td>{{ $row->grado->nombre }}</td>
								<td>{{ $row->areaconocimiento->nombre }}</td>
								<td width="90">
									<div class="dropdown">
										<a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
											Acciones
										</a>
										<ul class="dropdown-menu">
											<li><a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a></li>
											<li><a class="dropdown-item" onclick="confirm('¿Seguro desea eliminar el área {{$row->codigo}}? \n ¡Los datos eliminados no pueden ser ercuperados!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar </a></li>  
										</ul>
									</div>								
								</td>
							</tr>
							@empty
							<tr>
								<td class="text-center" colspan="100%">No se encontraron Áreas </td>
							</tr>
							@endforelse
						</tbody>
					</table>						
					<div class="float-end">{{ $codigoareaconocimientos->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>