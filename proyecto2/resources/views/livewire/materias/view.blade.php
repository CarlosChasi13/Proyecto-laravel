@section('title', __('Materias'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Materia Listing </h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Materias">
						</div>
						<div class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#createDataModal">
						<i class="fa fa-plus"></i>  Add Materias
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.materias.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Codigo</th>
								<th>Curso</th>
								<th>Nombre</th>
								<th>Descripcion</th>
								<th>Horas Creditos</th>
								<th>Horas Teoria</th>
								<th>Horas Laboratorio</th>
								<th>Horas Otros</th>
								<th>Id Cursos</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@forelse($materias as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->codigo }}</td>
								<td>{{ $row->curso }}</td>
								<td>{{ $row->nombre }}</td>
								<td>{{ $row->descripcion }}</td>
								<td>{{ $row->horas_creditos }}</td>
								<td>{{ $row->horas_teoria }}</td>
								<td>{{ $row->horas_laboratorio }}</td>
								<td>{{ $row->horas_otros }}</td>
								<td>{{ $row->id_cursos }}</td>
								<td width="90">
									<div class="dropdown">
										<a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
											Actions
										</a>
										<ul class="dropdown-menu">
											<li><a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a></li>
											<li><a class="dropdown-item" onclick="confirm('Confirm Delete Materia id {{$row->id}}? \nDeleted Materias cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a></li>  
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
					<div class="float-end">{{ $materias->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>