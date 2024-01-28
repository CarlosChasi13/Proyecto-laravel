<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Experiencialaboral;
use App\Models\Docente;

class Experiencialaborals extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_docente, $entidad, $cargo, $fecha_ingreso, $fecha_salida, $observaciones;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
		$docentes = Docente::all();
        return view('livewire.experiencialaborals.view', [
            'experiencialaborals' => Experiencialaboral::latest()
						->orWhere('id_docente', 'LIKE', $keyWord)
						->orWhere('entidad', 'LIKE', $keyWord)
						->orWhere('cargo', 'LIKE', $keyWord)
						->orWhere('fecha_ingreso', 'LIKE', $keyWord)
						->orWhere('fecha_salida', 'LIKE', $keyWord)
						->orWhere('observaciones', 'LIKE', $keyWord)
						->paginate(10),
			'docentes' => $docentes,
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->id_docente = null;
		$this->entidad = null;
		$this->cargo = null;
		$this->fecha_ingreso = null;
		$this->fecha_salida = null;
		$this->observaciones = null;
    }

    public function store()
    {
        $this->validate([
		'id_docente' => 'required',
		'entidad' => 'required',
		'cargo' => 'required',
		'fecha_ingreso' => 'required',
		'fecha_salida' => 'required',
		'observaciones' => 'required',
        ]);

        Experiencialaboral::create([ 
			'id_docente' => $this-> id_docente,
			'entidad' => $this-> entidad,
			'cargo' => $this-> cargo,
			'fecha_ingreso' => $this-> fecha_ingreso,
			'fecha_salida' => $this-> fecha_salida,
			'observaciones' => $this-> observaciones
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Experiencia laboral agregada exitosamente.');
    }

    public function edit($id)
    {
        $record = Experiencialaboral::findOrFail($id);
        $this->selected_id = $id; 
		$this->id_docente = $record-> id_docente;
		$this->entidad = $record-> entidad;
		$this->cargo = $record-> cargo;
		$this->fecha_ingreso = $record-> fecha_ingreso;
		$this->fecha_salida = $record-> fecha_salida;
		$this->observaciones = $record-> observaciones;
    }

    public function update()
    {
        $this->validate([
		'id_docente' => 'required',
		'entidad' => 'required',
		'cargo' => 'required',
		'fecha_ingreso' => 'required',
		'fecha_salida' => 'required',
		'observaciones' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Experiencialaboral::find($this->selected_id);
            $record->update([ 
			'id_docente' => $this-> id_docente,
			'entidad' => $this-> entidad,
			'cargo' => $this-> cargo,
			'fecha_ingreso' => $this-> fecha_ingreso,
			'fecha_salida' => $this-> fecha_salida,
			'observaciones' => $this-> observaciones
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Experiencia laboral editada exitosamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Experiencialaboral::where('id', $id)->delete();
        }
    }
}