@section('title', __('Capacitacions'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fas fa-chalkboard-teacher text-warning"></i>
							Capacitación </h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Capacitacions">
						</div>
						<div class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#createDataModal">
						<i class="fa fa-plus"></i>  Add Capacitacion
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.capacitacions.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Titulo</th>
								<th>Ies</th>
								<th>Horas</th>
								<th>Fecha</th>
								<th>Descripcion</th>
								<th>Id Docente</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@forelse($capacitacions as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->titulo }}</td>
								<td>{{ $row->ies }}</td>
								<td>{{ $row->horas }}</td>
								<td>{{ $row->fecha }}</td>
								<td>{{ $row->descripcion }}</td>
								<td>{{ $row->id_docente }}</td>
								<td width="90">
									<div class="dropdown">
										<a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
											Actions
										</a>
										<ul class="dropdown-menu">
											<li><a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a></li>
											<li><a class="dropdown-item" onclick="confirm('Confirm Delete Capacitacion id {{$row->id}}? \nDeleted Capacitacions cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a></li>  
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
					<div class="float-end">{{ $capacitacions->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>