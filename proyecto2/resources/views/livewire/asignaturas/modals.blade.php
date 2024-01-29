<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Crear nueva asignatura</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="id_periodoacademico">  Periodo Académico:</label>
                        <select wire:model="id_periodoacademico" class="form-control" id="id_periodoacademico" placeholder="Seleccione un Periodo Académico">
                            <option value="">Seleccione un Periodo Académico</option>
                                @foreach($periodos as $periodoacademico)
                            <option value="{{ $periodoacademico->id }}">{{ $periodoacademico->fecha_inicio }} - {{ $periodoacademico->fecha_fin }}</option>
                                @endforeach
                        </select>
                        @error('id_periodoacademico') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_codigoareaconocimiento">  Área de Conocimiento:</label>
                        <select wire:model="id_codigoareaconocimiento" class="form-control" id="id_codigoareaconocimiento" placeholder="Seleccione un Código de Área de Conocimiento">
                            <option value="">  Seleccione un Área de Conocimiento:</option>
                                @foreach($codigos as $codigoAreaConocimiento)
                            <option value="{{ $codigoAreaConocimiento->id }}">{{ $codigoAreaConocimiento->codigo }}</option>
                                @endforeach
                        </select>
                        @error('id_codigoareaconocimiento') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="codigo">  Código</label>
                        <input wire:model="codigo" type="text" class="form-control" id="codigo" placeholder="Codigo">@error('codigo') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="nombre">  Nombre:</label>
                        <input wire:model="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre">@error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="descripcion">  Descripción</label>
                        <input wire:model="descripcion" type="text" class="form-control" id="descripcion" placeholder="Descripcion">@error('descripcion') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="horas_teoria">  Horas teoría:</label>
                        <input wire:model="horas_teoria" type="text" class="form-control" id="horas_teoria" placeholder="Horas Teoria" oninput="validateHoras()">@error('horas_teoria') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="horas_laboratorio">  Horas Laboratorio:</label>
                        <input wire:model="horas_laboratorio" type="text" class="form-control" id="horas_laboratorio" placeholder="Horas Laboratorio" oninput="validateHoras()">@error('horas_laboratorio') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="horas_otros">  Horas otros:</label>
                        <input wire:model="horas_otros" type="text" class="form-control" id="horas_otros" placeholder="Horas Otros" oninput="validateHoras()">@error('horas_otros') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <script>
                        function validateHoras() {
                            var input = document.getElementById('horas_teoria');
                            input.value = input.value.replace(/\D/g, ''); // Elimina cualquier caracter no numérico
                        }
                    </script>
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
                <h5 class="modal-title" id="updateModalLabel">Actualizar asignatura</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="id_periodoacademico">  Periodo Académico:</label>
                        <select wire:model="id_periodoacademico" class="form-control" id="id_periodoacademico" placeholder="Seleccione un Periodo Académico">
                            <option value="">Seleccione un Periodo Académico</option>
                                @foreach($periodos as $periodoacademico)
                            <option value="{{ $periodoacademico->id }}">{{ $periodoacademico->fecha_inicio }} - {{ $periodoacademico->fecha_fin }}</option>
                                @endforeach
                        </select>
                        @error('id_periodoacademico') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_codigoareaconocimiento">  Área de Conocimiento:</label>
                        <select wire:model="id_codigoareaconocimiento" class="form-control" id="id_codigoareaconocimiento" placeholder="Seleccione un Código de Área de Conocimiento">
                            <option value="">  Seleccione un Área de Conocimiento:</option>
                                @foreach($codigos as $codigoAreaConocimiento)
                            <option value="{{ $codigoAreaConocimiento->id }}">{{ $codigoAreaConocimiento->codigo }}</option>
                                @endforeach
                        </select>
                        @error('id_codigoareaconocimiento') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="codigo">  Código:</label>
                        <input wire:model="codigo" type="text" class="form-control" id="codigo" placeholder="Codigo">@error('codigo') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="nombre">  Nombre:</label>
                        <input wire:model="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre">@error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="descripcion">  Descripción:</label>
                        <input wire:model="descripcion" type="text" class="form-control" id="descripcion" placeholder="Descripcion">@error('descripcion') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="horas_teoria">  Horas Teoría:</label>
                        <input wire:model="horas_teoria" type="text" class="form-control" id="horas_teoria" placeholder="Horas Teoria">@error('horas_teoria') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="horas_laboratorio">  Horas Laboratorio:</label>
                        <input wire:model="horas_laboratorio" type="text" class="form-control" id="horas_laboratorio" placeholder="Horas Laboratorio">@error('horas_laboratorio') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="horas_otros">  Horas otros:</label>
                        <input wire:model="horas_otros" type="text" class="form-control" id="horas_otros" placeholder="Horas Otros">@error('horas_otros') <span class="error text-danger">{{ $message }}</span> @enderror
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
