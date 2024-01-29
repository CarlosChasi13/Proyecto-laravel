<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Docente;
use App\Models\Genero;
use App\Models\Rol;

class Docentes extends Component
{
    use WithPagination;
	use WithFileUploads;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $cedula, $nombre, $apellido, $foto_personal, $fecha_nacimiento, $id_genero, $telefono, $email, $direccion, $id_rol, $acercade, $observaciones;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
		$generos = Genero::all();
		$roles=Rol::all();
        return view('livewire.docentes.view', [
            'docentes' => Docente::latest()
						->orWhere('cedula', 'LIKE', $keyWord)
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('apellido', 'LIKE', $keyWord)
						->orWhere('foto_personal', 'LIKE', $keyWord)
						->orWhere('fecha_nacimiento', 'LIKE', $keyWord)
						->orWhere('id_genero', 'LIKE', $keyWord)
						->orWhere('telefono', 'LIKE', $keyWord)
						->orWhere('email', 'LIKE', $keyWord)
						->orWhere('direccion', 'LIKE', $keyWord)
						->orWhere('id_rol', 'LIKE', $keyWord)
						->orWhere('acercade', 'LIKE', $keyWord)
						->orWhere('observaciones', 'LIKE', $keyWord)
						->paginate(10),
			'generos' => $generos,
			'roles' => $roles,
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->cedula = null;
		$this->nombre = null;
		$this->apellido = null;
		$this->foto_personal = null;
		$this->fecha_nacimiento = null;
		$this->id_genero = null;
		$this->telefono = null;
		$this->email = null;
		$this->direccion = null;
		$this->id_rol = null;
		$this->acercade = null;
		$this->observaciones = null;
    }

    public function store()
    {
        $this->validate([
		'cedula' => 'required',
		'nombre' => 'required',
		'apellido' => 'required',
		'fecha_nacimiento' => 'required',
		'id_genero' => 'required',
		'telefono' => 'required|digits:10',
		'email' => 'required|email',
		'direccion' => 'required',
		'id_rol' => 'required',
		'acercade' => 'required',
		'observaciones' => 'required',
		'foto_personal' => 'image|mimes:jpeg,png,jpg,gif|max:1024',
        ]);

		$rutaFoto = $this->foto_personal->store('fotos', 'public');

        Docente::create([ 
			'cedula' => $this-> cedula,
			'nombre' => $this-> nombre,
			'apellido' => $this-> apellido,
			'foto_personal' => $rutaFoto,
			'fecha_nacimiento' => $this-> fecha_nacimiento,
			'id_genero' => $this-> id_genero,
			'telefono' => $this-> telefono,
			'email' => $this-> email,
			'direccion' => $this-> direccion,
			'id_rol' => $this-> id_rol,
			'acercade' => $this-> acercade,
			'observaciones' => $this-> observaciones
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Docente creado exitosamente.');
    }

    public function edit($id)
    {
        $record = Docente::findOrFail($id);
        $this->selected_id = $id; 
		$this->cedula = $record-> cedula;
		$this->nombre = $record-> nombre;
		$this->apellido = $record-> apellido;
		$this->foto_personal = $record-> foto_personal;
		$this->fecha_nacimiento = $record-> fecha_nacimiento;
		$this->id_genero = $record-> id_genero;
		$this->telefono = $record-> telefono;
		$this->email = $record-> email;
		$this->direccion = $record-> direccion;
		$this->id_rol = $record-> id_rol;
		$this->acercade = $record-> acercade;
		$this->observaciones = $record-> observaciones;
    }

    public function update()
    {
        $this->validate([
		'cedula' => 'required',
		'nombre' => 'required',
		'apellido' => 'required',
		'fecha_nacimiento' => 'required',
		'id_genero' => 'required',
		'telefono' => 'required|digits:10',
		'email' => 'required|email',
		'direccion' => 'required',
		'id_rol' => 'required',
		'acercade' => 'required',
		'observaciones' => 'required',
        ]);

    if ($this->selected_id) {
        $record = Docente::find($this->selected_id);
        
        $data = [
            'cedula' => $this->cedula,
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'id_genero' => $this->id_genero,
            'telefono' => $this->telefono,
            'email' => $this->email,
            'direccion' => $this->direccion,
            'id_rol' => $this->id_rol,
            'acercade' => $this->acercade,
            'observaciones' => $this->observaciones
        ];

        if ($this->foto_personal) {
            $this->validate([
                'foto_personal' => 'image|mimes:jpeg,png,jpg,gif|max:1024',
            ]);

            $rutaFoto = $this->foto_personal->store('fotos', 'public');
            $data['foto_personal'] = $rutaFoto;
        }

        $record->update($data);

        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
        session()->flash('message', 'Docente Successfully updated.');
    }
}


    public function destroy($id)
    {
        if ($id) {
            Docente::where('id', $id)->delete();
        }
    }
}