<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Nrc</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="nrc"></label>
                        <input wire:model="nrc" type="text" class="form-control" id="nrc" placeholder="Nrc">@error('nrc') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="docente"></label>
                        <select wire:model="id_docentes" class="form-control" id="docente">
                        <option value="">Seleccione un Docente</option>
                        @foreach($docentes as $docente)
                        <option value="{{ $docente->id }}">{{ $docente->nombre }}</option>
                        @endforeach
                        </select>
                        @error('id_docente') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="materias"></label>
                        <select wire:model="id_materia" class="form-control" id="materias">
                        <option value="">Seleccione una Materia</option>
                        @foreach($materias as $materias)
                        <option value="{{ $materias->id }}">{{ $materias->nombre }}</option>
                        @endforeach
                        </select>
                        @error('id_materias') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_campus"></label>
                        <select wire:model="id_campus" class="form-control" id="id_campus">
                        <option value="">Seleccione un campus</option>
                        @foreach($campus as $campus)
                        <option value="{{ $campus->id }}">{{ $campus->Nombre }}</option>
                        @endforeach
                        </select>
                        @error('id_campus') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="departamentos"></label>
                        <select wire:model="id_departamento" class="form-control" id="departamentos">
                        <option value="">Seleccione un Departamento</option>
                        @foreach($departamentos as $departamentos)
                        <option value="{{ $departamentos->id }}">{{ $departamentos->Nombre }}</option>
                        @endforeach
                        </select>
                        @error('id_departamento') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="periodo"></label>
                        <select wire:model="id_periodoacademico" class="form-control" id="periodos">
                        <option value="">Seleccione el Periodo</option>
                        @foreach($periodos as $periodos)
                        <option value="{{ $periodos->id }}">{{ $periodos->nivel }}</option>
                        @endforeach
                        </select>
                        @error('id_periodos') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Nrc</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="nrc"></label>
                        <input wire:model="nrc" type="text" class="form-control" id="nrc" placeholder="Nrc">@error('nrc') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_campus"></label>
                        <input wire:model="id_campus" type="text" class="form-control" id="id_campus" placeholder="Id Campus">@error('id_campus') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_departamento"></label>
                        <input wire:model="id_departamento" type="text" class="form-control" id="id_departamento" placeholder="Id Departamento">@error('id_departamento') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_materia"></label>
                        <input wire:model="id_materia" type="text" class="form-control" id="id_materia" placeholder="Id Materia">@error('id_materia') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_docentes"></label>
                        <input wire:model="id_docentes" type="text" class="form-control" id="id_docentes" placeholder="Id Docentes">@error('id_docentes') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_periodoacademico"></label>
                        <input wire:model="id_periodoacademico" type="text" class="form-control" id="id_periodoacademico" placeholder="Id Periodoacademico">@error('id_periodoacademico') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary">Save</button>
            </div>
       </div>
    </div>
</div>
