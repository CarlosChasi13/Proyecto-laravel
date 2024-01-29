<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Crear nuevo Periodo académico</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="id_grado">  Grado:</label>
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
                        <label for="id_sigla">  Sigla:</label>
                        <select wire:model="id_sigla" class="form-control" id="id_sigla">
                            <option value="">Selecciona una sigla</option>
                            @foreach($siglas as $sigla)
                            <option value="{{ $sigla->id }}">{{ $sigla->nombre }}</option>
                            @endforeach
                        </select>
                        @error('id_sigla') 
                        <span class="error text-danger">{{ $message }}</span> 
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="fecha_inicio">  Fecha de inicio:</label>
                        <input wire:model="fecha_inicio" type="date" class="form-control" id="fecha_inicio" placeholder="Fecha Inicio">@error('fecha_inicio') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_fin">  Fecha de finalización: </label>
                        <input wire:model="fecha_fin" type="date" class="form-control" id="fecha_fin" placeholder="Fecha Fin">@error('fecha_fin') <span class="error text-danger">{{ $message }}</span> @enderror
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
                <h5 class="modal-title" id="updateModalLabel">Editar Período académico</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="id_grado">  Grado:</label>
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
                        <label for="id_sigla">  Sigla:</label>
                        <select wire:model="id_sigla" class="form-control" id="id_sigla">
                            <option value="">Selecciona una sigla</option>
                            @foreach($siglas as $sigla)
                            <option value="{{ $sigla->id }}">{{ $sigla->nombre }}</option>
                            @endforeach
                        </select>
                        @error('id_sigla') 
                        <span class="error text-danger">{{ $message }}</span> 
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_inicio">  Fecha de Inicio:</label>
                        <input wire:model="fecha_inicio" type="date" class="form-control" id="fecha_inicio" placeholder="Fecha Inicio">@error('fecha_inicio') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_fin">  Fecha de Finalización:</label>
                        <input wire:model="fecha_fin" type="date" class="form-control" id="fecha_fin" placeholder="Fecha Fin">@error('fecha_fin') <span class="error text-danger">{{ $message }}</span> @enderror
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
