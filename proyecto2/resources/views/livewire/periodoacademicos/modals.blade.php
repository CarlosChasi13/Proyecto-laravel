<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Periodoacademico</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="id_grado"></label>
                        <input wire:model="id_grado" type="text" class="form-control" id="id_grado" placeholder="Id Grado">@error('id_grado') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_sigla"></label>
                        <input wire:model="id_sigla" type="text" class="form-control" id="id_sigla" placeholder="Id Sigla">@error('id_sigla') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_inicio"></label>
                        <input wire:model="fecha_inicio" type="text" class="form-control" id="fecha_inicio" placeholder="Fecha Inicio">@error('fecha_inicio') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_fin"></label>
                        <input wire:model="fecha_fin" type="text" class="form-control" id="fecha_fin" placeholder="Fecha Fin">@error('fecha_fin') <span class="error text-danger">{{ $message }}</span> @enderror
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
                <h5 class="modal-title" id="updateModalLabel">Update Periodoacademico</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="id_grado"></label>
                        <input wire:model="id_grado" type="text" class="form-control" id="id_grado" placeholder="Id Grado">@error('id_grado') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_sigla"></label>
                        <input wire:model="id_sigla" type="text" class="form-control" id="id_sigla" placeholder="Id Sigla">@error('id_sigla') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_inicio"></label>
                        <input wire:model="fecha_inicio" type="text" class="form-control" id="fecha_inicio" placeholder="Fecha Inicio">@error('fecha_inicio') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_fin"></label>
                        <input wire:model="fecha_fin" type="text" class="form-control" id="fecha_fin" placeholder="Fecha Fin">@error('fecha_fin') <span class="error text-danger">{{ $message }}</span> @enderror
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
