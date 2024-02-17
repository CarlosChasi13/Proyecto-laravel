<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Asignatura;
use App\Models\Periodoacademico;
use App\Models\Codigoareaconocimiento;

class Asignaturas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_periodoacademico, $id_codigoareaconocimiento, $codigo, $nombre, $descripcion, $horas_teoria, $horas_laboratorio, $horas_otros;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
		$periodos=Periodoacademico::all();
		$codigos=Codigoareaconocimiento::all();
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
			'periodos' => $periodos,
			'codigos' => $codigos,
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
		'horas_teoria' => 'required|integer|min:0',
		'horas_laboratorio' => 'required|integer|min:0',
		'horas_otros' => 'required|integer|min:0',

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
		session()->flash('message', 'Asignatura creada exitosamente.');
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
		'horas_teoria' => 'required|integer|min:0',
		'horas_laboratorio' => 'required|integer|min:0',
		'horas_otros' => 'required|integer|min:0',

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
			session()->flash('message', 'Asignatura editada exitosamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Asignatura::where('id', $id)->delete();
        }
    }
}