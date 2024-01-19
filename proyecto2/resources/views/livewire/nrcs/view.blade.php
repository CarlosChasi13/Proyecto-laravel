@section('title', __('Nrcs'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fas fa-hashtag text-primary"></i>
							NRC</h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Nrcs">
						</div>
						<div class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#createDataModal">
						<i class="fa fa-plus"></i>  Add Nrcs
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.nrcs.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Nrc</th>
								<th>Id Campus</th>
								<th>Id Departamento</th>
								<th>Id Materia</th>
								<th>Id Docentes</th>
								<th>Id Periodoacademico</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@forelse($nrcs as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->nrc }}</td>
								<td>{{ $row->id_campus }}</td>
								<td>{{ $row->id_departamento }}</td>
								<td>{{ $row->id_materia }}</td>
								<td>{{ $row->id_docentes }}</td>
								<td>{{ $row->id_periodoacademico }}</td>
								<td width="90">
									<div class="dropdown">
										<a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
											Actions
										</a>
										<ul class="dropdown-menu">
											<li><a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a></li>
											<li><a class="dropdown-item" onclick="confirm('Confirm Delete Nrc id {{$row->id}}? \nDeleted Nrcs cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a></li>  
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
					<div class="float-end">{{ $nrcs->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>