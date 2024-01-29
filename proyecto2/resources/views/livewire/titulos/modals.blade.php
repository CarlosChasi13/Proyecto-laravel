<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Crear nuevo Título</h5>
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
                        <label for="fecha">  Fecha:</label>
                        <input wire:model="fecha" type="date" class="form-control" id="fecha" placeholder="Fecha">@error('fecha') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="ies">  IES:</label>
                        <input wire:model="ies" type="text" class="form-control" id="ies" placeholder="Ies">@error('ies') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="nombre">  Nombre:</label>
                        <input wire:model="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre">@error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="observaciones">  Observaciones:</label>
                        <input wire:model="observaciones" type="text" class="form-control" id="observaciones" placeholder="Observaciones">@error('observaciones') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <!--<div class="form-group">
                        <label for="principal">  Principal:</label>
                        <input wire:model="principal" type="text" class="form-control" id="principal" placeholder="Principal">@error('principal') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>-->

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
                <h5 class="modal-title" id="updateModalLabel">Editar Titulo</h5>
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
                        <label for="fecha">  Fecha:</label>
                        <input wire:model="fecha" type="date" class="form-control" id="fecha" placeholder="Fecha">@error('fecha') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="ies">  IES:</label>
                        <input wire:model="ies" type="text" class="form-control" id="ies" placeholder="Ies">@error('ies') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="nombre">  Nombre:</label>
                        <input wire:model="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre">@error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="observaciones">  Observaciones:</label>
                        <input wire:model="observaciones" type="text" class="form-control" id="observaciones" placeholder="Observaciones">@error('observaciones') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <!--<div class="form-group">
                        <label for="principal">  Principal:</label>
                        <input wire:model="principal" type="text" class="form-control" id="principal" placeholder="Principal">@error('principal') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>-->

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary">Guardar</button>
            </div>
       </div>
    </div>
</div>
