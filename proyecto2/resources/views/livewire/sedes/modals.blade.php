<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Crear Sede</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="nombre">  Nombre:</label>
                        <input wire:model="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre">@error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <input wire:model="telefono" type="text" class="form-control" id="telefono" placeholder="Telefono">
                    @error('telefono') 
                    <span class="error text-danger">{{ $message }}</span> 
                    @enderror
                </div>
                <script>
                    // Agrega un evento de escucha para el evento input en el campo de teléfono
                    document.getElementById('telefono').addEventListener('input', function (event) {
                    // Obtén el valor actual del campo de teléfono
                    let telefonoValue = event.target.value;

                    // Elimina cualquier caracter que no sea un número entero
                    telefonoValue = telefonoValue.replace(/\D/g, '');

                    // Limita el número de caracteres a 15
                    telefonoValue = telefonoValue.slice(0, 15);

                    // Actualiza el valor del campo de teléfono
                    event.target.value = telefonoValue;
                    });
                </script>

                    <div class="form-group">
                        <label for="email">  Email:</label>
                        <input wire:model="email" type="text" class="form-control" id="email" placeholder="Email">@error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección: </label>
                        <input wire:model="direccion" type="text" class="form-control" id="direccion" placeholder="Direccion">@error('direccion') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="ciudad">  Ciudad:</label>
                        <input wire:model="ciudad" type="text" class="form-control" id="ciudad" placeholder="Ciudad">@error('ciudad') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_provincia">  Provincia:</label>
                        <select wire:model="id_provincia" class="form-control" id="id_provincia">
                            <option value="">Selecciona una provincia</option>
                                @foreach($provincias as $provincia)
                            <option value="{{ $provincia->id }}">{{ $provincia->nombre }}</option>
                                @endforeach
                        </select>
                        @error('id_provincia') 
                        <span class="error text-danger">{{ $message }}</span> 
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_pais">  País:</label>
                        <select wire:model="id_pais" class="form-control" id="id_pais">
                            <option value="">Selecciona un país</option>
                                @foreach($paises as $pais)
                            <option value="{{ $pais->id }}">{{ $pais->nombre }}</option>
                                @endforeach
                        </select>
                        @error('id_pais') 
                        <span class="error text-danger">{{ $message }}</span> 
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="maps_url">  Url de la sede en Google Maps:</label>
                        <input wire:model="maps_url" type="text" class="form-control" id="maps_url" placeholder="Maps Url">@error('maps_url') <span class="error text-danger">{{ $message }}</span> @enderror
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
                <h5 class="modal-title" id="updateModalLabel">Editar Sede</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="nombre">  Nombre:</label>
                        <input wire:model="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre">@error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="telefono">  Teléfono:</label>
                        <input wire:model="telefono" type="text" class="form-control" id="telefono" placeholder="Telefono">@error('telefono') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">  Email:</label>
                        <input wire:model="email" type="text" class="form-control" id="email" placeholder="Email">@error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="direccion">  Dirección:</label>
                        <input wire:model="direccion" type="text" class="form-control" id="direccion" placeholder="Direccion">@error('direccion') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="ciudad">  Ciudad:</label>
                        <input wire:model="ciudad" type="text" class="form-control" id="ciudad" placeholder="Ciudad">@error('ciudad') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_provincia">  Provincia:</label>
                        <select wire:model="id_provincia" class="form-control" id="id_provincia">
                            <option value="">Selecciona una provincia</option>
                                @foreach($provincias as $provincia)
                            <option value="{{ $provincia->id }}">{{ $provincia->nombre }}</option>
                                @endforeach
                        </select>
                        @error('id_provincia') 
                        <span class="error text-danger">{{ $message }}</span> 
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_pais">  País:</label>
                        <select wire:model="id_pais" class="form-control" id="id_pais">
                            <option value="">Selecciona un país</option>
                                @foreach($paises as $pais)
                            <option value="{{ $pais->id }}">{{ $pais->nombre }}</option>
                                @endforeach
                        </select>
                        @error('id_pais') 
                        <span class="error text-danger">{{ $message }}</span> 
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="maps_url">  Url de la sede en Google Maps:</label>
                        <input wire:model="maps_url" type="text" class="form-control" id="maps_url" placeholder="Maps Url">@error('maps_url') <span class="error text-danger">{{ $message }}</span> @enderror
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
