<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Asignatura;

class Asignaturas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_periodoacademico, $id_codigoareaconocimiento, $codigo, $nombre, $descripcion, $horas_teoria, $horas_laboratorio, $horas_otros;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.asignaturas.view', [
            'asignaturas' => Asignatura::latest()
						->orWhere('id_periodoacademico', 'LIKE', $keyWord)
						->orWhere('id_codigoareaconocimiento', 'LIKE', $keyWord)
						->orWhere('codigo', 'LIKE', $keyWord)
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('descripcion', 'LIKE', $keyWord)
						->orWhere('horas_teoria', 'LIKE', $keyWord)
						->orWhere('horas_laboratorio', 'LIKE', $keyWord)
						->orWhere('horas_otros', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->id_periodoacademico = null;
		$this->id_codigoareaconocimiento = null;
		$this->codigo = null;
		$this->nombre = null;
		$this->descripcion = null;
		$this->horas_teoria = null;
		$this->horas_laboratorio = null;
		$this->horas_otros = null;
    }

    public function store()
    {
        $this->validate([
		'id_periodoacademico' => 'required',
		'id_codigoareaconocimiento' => 'required',
		'codigo' => 'required',
		'nombre' => 'required',
		'descripcion' => 'required',
		'horas_teoria' => 'required',
		'horas_laboratorio' => 'required',
		'horas_otros' => 'required',
        ]);

        Asignatura::create([ 
			'id_periodoacademico' => $this-> id_periodoacademico,
			'id_codigoareaconocimiento' => $this-> id_codigoareaconocimiento,
			'codigo' => $this-> codigo,
			'nombre' => $this-> nombre,
			'descripcion' => $this-> descripcion,
			'horas_teoria' => $this-> horas_teoria,
			'horas_laboratorio' => $this-> horas_laboratorio,
			'horas_otros' => $this-> horas_otros
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Asignatura Successfully created.');
    }

    public function edit($id)
    {
        $record = Asignatura::findOrFail($id);
        $this->selected_id = $id; 
		$this->id_periodoacademico = $record-> id_periodoacademico;
		$this->id_codigoareaconocimiento = $record-> id_codigoareaconocimiento;
		$this->codigo = $record-> codigo;
		$this->nombre = $record-> nombre;
		$this->descripcion = $record-> descripcion;
		$this->horas_teoria = $record-> horas_teoria;
		$this->horas_laboratorio = $record-> horas_laboratorio;
		$this->horas_otros = $record-> horas_otros;
    }

    public function update()
    {
        $this->validate([
		'id_periodoacademico' => 'required',
		'id_codigoareaconocimiento' => 'required',
		'codigo' => 'required',
		'nombre' => 'required',
		'descripcion' => 'required',
		'horas_teoria' => 'required',
		'horas_laboratorio' => 'required',
		'horas_otros' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Asignatura::find($this->selected_id);
            $record->update([ 
			'id_periodoacademico' => $this-> id_periodoacademico,
			'id_codigoareaconocimiento' => $this-> id_codigoareaconocimiento,
			'codigo' => $this-> codigo,
			'nombre' => $this-> nombre,
			'descripcion' => $this-> descripcion,
			'horas_teoria' => $this-> horas_teoria,
			'horas_laboratorio' => $this-> horas_laboratorio,
			'horas_otros' => $this-> horas_otros
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Asignatura Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Asignatura::where('id', $id)->delete();
        }
    }
}