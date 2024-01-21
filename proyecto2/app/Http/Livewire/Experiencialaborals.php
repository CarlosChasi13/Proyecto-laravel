<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Experiencialaboral;

class Experiencialaborals extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $entidad, $cargo, $fecha_ingreso, $fecha_salida, $observacion, $id_docente;

    public function render()
    {
		$docentes = \App\Models\Docente::all();
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.experiencialaborals.view', [
            'experiencialaborals' => Experiencialaboral::latest()
						->orWhere('entidad', 'LIKE', $keyWord)
						->orWhere('cargo', 'LIKE', $keyWord)
						->orWhere('fecha_ingreso', 'LIKE', $keyWord)
						->orWhere('fecha_salida', 'LIKE', $keyWord)
						->orWhere('observacion', 'LIKE', $keyWord)
						->orWhere('id_docente', 'LIKE', $keyWord)
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
		$this->entidad = null;
		$this->cargo = null;
		$this->fecha_ingreso = null;
		$this->fecha_salida = null;
		$this->observacion = null;
		$this->id_docente = null;
    }

    public function store()
    {
        $this->validate([
		'entidad' => 'required',
		'cargo' => 'required',
		'fecha_ingreso' => 'required',
		'fecha_salida' => 'required',
		'observacion' => 'required',
		'id_docente' => 'required',
        ]);

        Experiencialaboral::create([ 
			'entidad' => $this-> entidad,
			'cargo' => $this-> cargo,
			'fecha_ingreso' => $this-> fecha_ingreso,
			'fecha_salida' => $this-> fecha_salida,
			'observacion' => $this-> observacion,
			'id_docente' => $this-> id_docente
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Experiencialaboral Successfully created.');
    }

    public function edit($id)
    {
        $record = Experiencialaboral::findOrFail($id);
        $this->selected_id = $id; 
		$this->entidad = $record-> entidad;
		$this->cargo = $record-> cargo;
		$this->fecha_ingreso = $record-> fecha_ingreso;
		$this->fecha_salida = $record-> fecha_salida;
		$this->observacion = $record-> observacion;
		$this->id_docente = $record-> id_docente;
    }

    public function update()
    {
        $this->validate([
		'entidad' => 'required',
		'cargo' => 'required',
		'fecha_ingreso' => 'required',
		'fecha_salida' => 'required',
		'observacion' => 'required',
		'id_docente' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Experiencialaboral::find($this->selected_id);
            $record->update([ 
			'entidad' => $this-> entidad,
			'cargo' => $this-> cargo,
			'fecha_ingreso' => $this-> fecha_ingreso,
			'fecha_salida' => $this-> fecha_salida,
			'observacion' => $this-> observacion,
			'id_docente' => $this-> id_docente
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Experiencialaboral Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Experiencialaboral::where('id', $id)->delete();
        }
    }
}