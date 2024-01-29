<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Crear nuevo Nrc</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="id_sede">Sede</label>
                        <select wire:model="id_sede" class="form-control" id="id_sede" placeholder="Seleccione una Sede">
                            <option value="">Seleccione una Sede</option>
                                @foreach($sedes as $sede)
                            <option value="{{ $sede->id }}">{{ $sede->nombre }}</option>
                                @endforeach
                            </select>
                            @error('id_sede') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_asignatura">Asignatura</label>
                        <select wire:model="id_asignatura" class="form-control" id="id_asignatura" placeholder="Seleccione una Asignatura">
                            <option value="">Seleccione una Asignatura</option>
                                @foreach($asignaturas as $asignatura)
                            <option value="{{ $asignatura->id }}">{{ $asignatura->nombre }}</option>
                                @endforeach
                        </select>
                        @error('id_asignatura') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_docente">  Docente:</label>
                        <select wire:model="id_docente" class="form-control" id="id_docente" placeholder="Seleccione un Docente">
                            <option value="">Seleccione un Docente</option>
                                @foreach($docentes as $docente)
                            <option value="{{ $docente->id }}">{{ $docente->nombre }} {{ $docente->apellido }}</option>
                                @endforeach
                        </select>
                        @error('id_docente') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Actualizar Nrc</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="id_sede">Sede</label>
                        <select wire:model="id_sede" class="form-control" id="id_sede" placeholder="Seleccione una Sede">
                            <option value="">Seleccione una Sede</option>
                                @foreach($sedes as $sede)
                            <option value="{{ $sede->id }}">{{ $sede->nombre }}</option>
                                @endforeach
                            </select>
                            @error('id_sede') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_asignatura">Asignatura</label>
                        <select wire:model="id_asignatura" class="form-control" id="id_asignatura" placeholder="Seleccione una Asignatura">
                            <option value="">Seleccione una Asignatura</option>
                                @foreach($asignaturas as $asignatura)
                            <option value="{{ $asignatura->id }}">{{ $asignatura->nombre }}</option>
                                @endforeach
                        </select>
                        @error('id_asignatura') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_docente">  Docente:</label>
                        <select wire:model="id_docente" class="form-control" id="id_docente" placeholder="Seleccione un Docente">
                            <option value="">Seleccione un Docente</option>
                                @foreach($docentes as $docente)
                            <option value="{{ $docente->id }}">{{ $docente->nombre }} {{ $docente->apellido }}</option>
                                @endforeach
                        </select>
                        @error('id_docente') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary">Guardar</button>
            </div>
       </div>
    </div>
</div>
