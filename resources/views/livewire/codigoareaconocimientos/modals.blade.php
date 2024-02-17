<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Crear nuevo código área de conocimiento</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="codigo">  Código</label>
                        <input wire:model="codigo" type="text" class="form-control" id="codigo" placeholder="Codigo">@error('codigo') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_grado">Grado:</label>
                        <select wire:model="id_grado" class="form-control" id="id_grado">
                            <option value="">Selecciona un grado</option>
                                @foreach($grados as $grado)
                            <option value="{{ $grado->id }}">{{ $grado->nombre }}</option>
                                @endforeach
                        </select>
                        @error('id_grado') 
                        <span class="error text-danger">{{ $message }}</span> 
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_areaconocimiento">Área de Conocimiento:</label>
                        <select wire:model="id_areaconocimiento" class="form-control" id="id_areaconocimiento">
                            <option value="">Selecciona un área de conocimiento</option>
                                @foreach($areas as $area)
                            <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                                @endforeach
                        </select>
                        @error('id_areaconocimiento') 
                        <span class="error text-danger">{{ $message }}</span> 
                        @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary">Guardar</button>
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
                <h5 class="modal-title" id="updateModalLabel">Editar Código</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="codigo">  Código:</label>
                        <input wire:model="codigo" type="text" class="form-control" id="codigo" placeholder="Codigo">@error('codigo') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_grado">Grado:</label>
                        <select wire:model="id_grado" class="form-control" id="id_grado">
                            <option value="">Selecciona un grado</option>
                                @foreach($grados as $grado)
                            <option value="{{ $grado->id }}">{{ $grado->nombre }}</option>
                                @endforeach
                        </select>
                        @error('id_grado') 
                        <span class="error text-danger">{{ $message }}</span> 
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_areaconocimiento">Área de Conocimiento:</label>
                        <select wire:model="id_areaconocimiento" class="form-control" id="id_areaconocimiento">
                            <option value="">Selecciona un área de conocimiento</option>
                                @foreach($areas as $area)
                            <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                                @endforeach
                        </select>
                        @error('id_areaconocimiento') 
                        <span class="error text-danger">{{ $message }}</span> 
                        @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary">Guardar</button>
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary">Guardar</button>
            </div>
       </div>
    </div>
</div>
