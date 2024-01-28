<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Crear Área de interés</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
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
                    <div class="form-group">
                        <label for="id_areaconocimiento">Área de Conocimiento</label>
                        <select wire:model="id_areaconocimiento" class="form-control" id="id_areaconocimiento" placeholder="Seleccione un Área de Conocimiento">
                            <option value="">Seleccione un Área de Conocimiento</option>
                                @foreach($areas as $areaconocimiento)
                            <option value="{{ $areaconocimiento->id }}">{{ $areaconocimiento->nombre }}</option>
                                @endforeach
                        </select>
                        @error('id_areaconocimiento') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="tema">  Tema:</label>
                        <input wire:model="tema" type="text" class="form-control" id="tema" placeholder="Tema">@error('tema') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="descripcion">  Descripción</label>
                        <input wire:model="descripcion" type="text" class="form-control" id="descripcion" placeholder="Descripcion">@error('descripcion') <span class="error text-danger">{{ $message }}</span> @enderror
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
                <h5 class="modal-title" id="updateModalLabel">Editar Área de interés</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
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
                    <div class="form-group">
                        <label for="id_areaconocimiento">Área de Conocimiento</label>
                        <select wire:model="id_areaconocimiento" class="form-control" id="id_areaconocimiento" placeholder="Seleccione un Área de Conocimiento">
                            <option value="">Seleccione un Área de Conocimiento</option>
                                @foreach($areas as $areaconocimiento)
                            <option value="{{ $areaconocimiento->id }}">{{ $areaconocimiento->nombre }}</option>
                                @endforeach
                        </select>
                        @error('id_areaconocimiento') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="tema">  Tema:</label>
                        <input wire:model="tema" type="text" class="form-control" id="tema" placeholder="Tema">@error('tema') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="descripcion">  Descripción:</label>
                        <input wire:model="descripcion" type="text" class="form-control" id="descripcion" placeholder="Descripcion">@error('descripcion') <span class="error text-danger">{{ $message }}</span> @enderror
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
