<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Docente;

class Docentes extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $cedula, $nombre, $apellido, $fecha_nacimiento, $id_genero, $foto_personal, $genero, $telefono, $email, $direccion, $acercade, $observaciones;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.docentes.view', [
            'docentes' => Docente::latest()
						->orWhere('cedula', 'LIKE', $keyWord)
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('apellido', 'LIKE', $keyWord)
						->orWhere('fecha_nacimiento', 'LIKE', $keyWord)
						->orWhere('id_genero', 'LIKE', $keyWord)
						->orWhere('foto_personal', 'LIKE', $keyWord)
						->orWhere('genero', 'LIKE', $keyWord)
						->orWhere('telefono', 'LIKE', $keyWord)
						->orWhere('email', 'LIKE', $keyWord)
						->orWhere('direccion', 'LIKE', $keyWord)
						->orWhere('acercade', 'LIKE', $keyWord)
						->orWhere('observaciones', 'LIKE', $keyWord)
						->paginate(10),
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
		$this->fecha_nacimiento = null;
		$this->id_genero = null;
		$this->foto_personal = null;
		$this->genero = null;
		$this->telefono = null;
		$this->email = null;
		$this->direccion = null;
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
		'genero' => 'required',
		'telefono' => 'required',
		'email' => 'required',
		'direccion' => 'required',
		'acercade' => 'required',
		'observaciones' => 'required',
        ]);

        Docente::create([ 
			'cedula' => $this-> cedula,
			'nombre' => $this-> nombre,
			'apellido' => $this-> apellido,
			'fecha_nacimiento' => $this-> fecha_nacimiento,
			'id_genero' => $this-> id_genero,
			'foto_personal' => $this-> foto_personal,
			'genero' => $this-> genero,
			'telefono' => $this-> telefono,
			'email' => $this-> email,
			'direccion' => $this-> direccion,
			'acercade' => $this-> acercade,
			'observaciones' => $this-> observaciones
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Docente Successfully created.');
    }

    public function edit($id)
    {
        $record = Docente::findOrFail($id);
        $this->selected_id = $id; 
		$this->cedula = $record-> cedula;
		$this->nombre = $record-> nombre;
		$this->apellido = $record-> apellido;
		$this->fecha_nacimiento = $record-> fecha_nacimiento;
		$this->id_genero = $record-> id_genero;
		$this->foto_personal = $record-> foto_personal;
		$this->genero = $record-> genero;
		$this->telefono = $record-> telefono;
		$this->email = $record-> email;
		$this->direccion = $record-> direccion;
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
		'genero' => 'required',
		'telefono' => 'required',
		'email' => 'required',
		'direccion' => 'required',
		'acercade' => 'required',
		'observaciones' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Docente::find($this->selected_id);
            $record->update([ 
			'cedula' => $this-> cedula,
			'nombre' => $this-> nombre,
			'apellido' => $this-> apellido,
			'fecha_nacimiento' => $this-> fecha_nacimiento,
			'id_genero' => $this-> id_genero,
			'foto_personal' => $this-> foto_personal,
			'genero' => $this-> genero,
			'telefono' => $this-> telefono,
			'email' => $this-> email,
			'direccion' => $this-> direccion,
			'acercade' => $this-> acercade,
			'observaciones' => $this-> observaciones
            ]);

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