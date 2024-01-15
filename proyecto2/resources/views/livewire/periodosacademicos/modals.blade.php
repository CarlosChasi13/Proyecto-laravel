<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Periodosacademico</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="nivel"></label>
                        <input wire:model="nivel" type="text" class="form-control" id="nivel" placeholder="Nivel">@error('nivel') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="siglas"></label>
                        <input wire:model="siglas" type="text" class="form-control" id="siglas" placeholder="Siglas">@error('siglas') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="mes_inicio"></label>
                        <input wire:model="mes_inicio" type="text" class="form-control" id="mes_inicio" placeholder="Mes Inicio">@error('mes_inicio') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="año_inicio"></label>
                        <input wire:model="año_inicio" type="text" class="form-control" id="año_inicio" placeholder="Año Inicio">@error('año_inicio') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="mes_fin"></label>
                        <input wire:model="mes_fin" type="text" class="form-control" id="mes_fin" placeholder="Mes Fin">@error('mes_fin') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="año_fin"></label>
                        <input wire:model="año_fin" type="text" class="form-control" id="año_fin" placeholder="Año Fin">@error('año_fin') <span class="error text-danger">{{ $message }}</span> @enderror
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
                <h5 class="modal-title" id="updateModalLabel">Update Periodosacademico</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="nivel"></label>
                        <input wire:model="nivel" type="text" class="form-control" id="nivel" placeholder="Nivel">@error('nivel') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="siglas"></label>
                        <input wire:model="siglas" type="text" class="form-control" id="siglas" placeholder="Siglas">@error('siglas') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="mes_inicio"></label>
                        <input wire:model="mes_inicio" type="text" class="form-control" id="mes_inicio" placeholder="Mes Inicio">@error('mes_inicio') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="año_inicio"></label>
                        <input wire:model="año_inicio" type="text" class="form-control" id="año_inicio" placeholder="Año Inicio">@error('año_inicio') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="mes_fin"></label>
                        <input wire:model="mes_fin" type="text" class="form-control" id="mes_fin" placeholder="Mes Fin">@error('mes_fin') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="año_fin"></label>
                        <input wire:model="año_fin" type="text" class="form-control" id="año_fin" placeholder="Año Fin">@error('año_fin') <span class="error text-danger">{{ $message }}</span> @enderror
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
