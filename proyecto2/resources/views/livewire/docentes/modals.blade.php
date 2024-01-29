<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Crear nuevo Docente</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="cedula">  Cédula:</label>
                        <input wire:model="cedula" type="text" class="form-control" id="cedula" placeholder="Cedula">@error('cedula') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="nombre">  Nombre:</label>
                        <input wire:model="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre">@error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="apellido">  Apellido:</label>
                        <input wire:model="apellido" type="text" class="form-control" id="apellido" placeholder="Apellido">@error('apellido') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto_personal">Foto Personal</label>
                        <input wire:model="foto_personal" type="file" class="form-control" id="foto_personal" placeholder="Foto Personal">@error('foto_personal') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_nacimiento">  Fecha de Nacimiento:</label>
                        <input wire:model="fecha_nacimiento" type="date" class="form-control" id="fecha_nacimiento" placeholder="Fecha Nacimiento">@error('fecha_nacimiento') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_genero">  Género:</label>
                        <select wire:model="id_genero" class="form-control" id="id_genero" placeholder="Seleccione un Género">
                            <option value="">Seleccione un Género</option>
                            @foreach($generos as $genero)
                            <option value="{{ $genero->id }}">{{ $genero->nombre }}</option>
                            @endforeach
                        </select>
                        @error('id_genero') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="telefono">  Teléfono</label>
                        <input wire:model="telefono" type="text" class="form-control" id="telefono" placeholder="Telefono" oninput="validateTelefono()">@error('telefono') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <script>
                        function validateTelefono() {
                        var input = document.getElementById('telefono');
                        input.value = input.value.replace(/\D/g, ''); // Elimina cualquier caracter no numérico
                        if (input.value.length > 10) {
                            input.value = input.value.slice(0, 10); // Limita la longitud a 10 caracteres
                            }
                        }
                    </script>
                    <div class="form-group">
                        <label for="email">  Email:</label>
                        <input wire:model="email" type="text" class="form-control" id="email" placeholder="Email">@error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="direccion">  Dirección</label>
                        <input wire:model="direccion" type="text" class="form-control" id="direccion" placeholder="Direccion">@error('direccion') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_rol">Rol:</label>
                        <select wire:model="id_rol" class="form-control" id="id_rol" placeholder="Seleccione un Rol">
                            <option value="">Seleccione un Rol</option>
                            @foreach($roles as $rol)
                            <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
                            @endforeach
                        </select>
                        @error('id_rol') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="acercade">  Acerca de:</label>
                        <input wire:model="acercade" type="text" class="form-control" id="acercade" placeholder="Acercade">@error('acercade') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="observaciones">  Observaciones:</label>
                        <input wire:model="observaciones" type="text" class="form-control" id="observaciones" placeholder="Observaciones">@error('observaciones') <span class="error text-danger">{{ $message }}</span> @enderror
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
                <h5 class="modal-title" id="updateModalLabel">Actualizar Docente</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="cedula">  Cédula:</label>
                        <input wire:model="cedula" type="text" class="form-control" id="cedula" placeholder="Cedula">@error('cedula') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="nombre">  Nombre:</label>
                        <input wire:model="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre">@error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="apellido">  Apellido</label>
                        <input wire:model="apellido" type="text" class="form-control" id="apellido" placeholder="Apellido">@error('apellido') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto_personal">Foto Personal</label>
                        <input wire:model="foto_personal" type="file" class="form-control" id="foto_personal" placeholder="Foto Personal">@error('foto_personal') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_nacimiento">  Fecha de nacimiento:</label>
                        <input wire:model="fecha_nacimiento" type="date" class="form-control" id="fecha_nacimiento" placeholder="Fecha Nacimiento">@error('fecha_nacimiento') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_genero">Género</label>
                        <select wire:model="id_genero" class="form-control" id="id_genero" placeholder="Seleccione un Género">
                            <option value="">Seleccione un Género</option>
                            @foreach($generos as $genero)
                            <option value="{{ $genero->id }}">{{ $genero->nombre }}</option>
                            @endforeach
                        </select>
                        @error('id_genero') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="telefono">  Teléfono</label>
                        <input wire:model="telefono" type="text" class="form-control" id="telefono" placeholder="Telefono">@error('telefono') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">  Email</label>
                        <input wire:model="email" type="text" class="form-control" id="email" placeholder="Email">@error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="direccion">  Dirección</label>
                        <input wire:model="direccion" type="text" class="form-control" id="direccion" placeholder="Direccion">@error('direccion') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_rol">Rol:</label>
                        <select wire:model="id_rol" class="form-control" id="id_rol" placeholder="Seleccione un Rol">
                            <option value="">Seleccione un Rol</option>
                            @foreach($roles as $rol)
                            <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
                            @endforeach
                        </select>
                        @error('id_rol') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="acercade">  Acerca de:</label>
                        <input wire:model="acercade" type="text" class="form-control" id="acercade" placeholder="Acercade">@error('acercade') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="observaciones">  Observaciones</label>
                        <input wire:model="observaciones" type="text" class="form-control" id="observaciones" placeholder="Observaciones">@error('observaciones') <span class="error text-danger">{{ $message }}</span> @enderror
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
