<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Materia;

class Materias extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $codigo, $curso, $nombre, $descripcion, $horas_creditos, $horas_teoria, $horas_laboratorio, $horas_otros, $id_cursos;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.materias.view', [
            'materias' => Materia::latest()
						->orWhere('codigo', 'LIKE', $keyWord)
						->orWhere('curso', 'LIKE', $keyWord)
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('descripcion', 'LIKE', $keyWord)
						->orWhere('horas_creditos', 'LIKE', $keyWord)
						->orWhere('horas_teoria', 'LIKE', $keyWord)
						->orWhere('horas_laboratorio', 'LIKE', $keyWord)
						->orWhere('horas_otros', 'LIKE', $keyWord)
						->orWhere('id_cursos', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->codigo = null;
		$this->curso = null;
		$this->nombre = null;
		$this->descripcion = null;
		$this->horas_creditos = null;
		$this->horas_teoria = null;
		$this->horas_laboratorio = null;
		$this->horas_otros = null;
		$this->id_cursos = null;
    }

    public function store()
    {
        $this->validate([
		'codigo' => 'required',
		'curso' => 'required',
		'nombre' => 'required',
		'descripcion' => 'required',
		'horas_creditos' => 'required',
		'horas_teoria' => 'required',
		'horas_laboratorio' => 'required',
		'horas_otros' => 'required',
		'id_cursos' => 'required',
        ]);

        Materia::create([ 
			'codigo' => $this-> codigo,
			'curso' => $this-> curso,
			'nombre' => $this-> nombre,
			'descripcion' => $this-> descripcion,
			'horas_creditos' => $this-> horas_creditos,
			'horas_teoria' => $this-> horas_teoria,
			'horas_laboratorio' => $this-> horas_laboratorio,
			'horas_otros' => $this-> horas_otros,
			'id_cursos' => $this-> id_cursos
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Materia Successfully created.');
    }

    public function edit($id)
    {
        $record = Materia::findOrFail($id);
        $this->selected_id = $id; 
		$this->codigo = $record-> codigo;
		$this->curso = $record-> curso;
		$this->nombre = $record-> nombre;
		$this->descripcion = $record-> descripcion;
		$this->horas_creditos = $record-> horas_creditos;
		$this->horas_teoria = $record-> horas_teoria;
		$this->horas_laboratorio = $record-> horas_laboratorio;
		$this->horas_otros = $record-> horas_otros;
		$this->id_cursos = $record-> id_cursos;
    }

    public function update()
    {
        $this->validate([
		'codigo' => 'required',
		'curso' => 'required',
		'nombre' => 'required',
		'descripcion' => 'required',
		'horas_creditos' => 'required',
		'horas_teoria' => 'required',
		'horas_laboratorio' => 'required',
		'horas_otros' => 'required',
		'id_cursos' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Materia::find($this->selected_id);
            $record->update([ 
			'codigo' => $this-> codigo,
			'curso' => $this-> curso,
			'nombre' => $this-> nombre,
			'descripcion' => $this-> descripcion,
			'horas_creditos' => $this-> horas_creditos,
			'horas_teoria' => $this-> horas_teoria,
			'horas_laboratorio' => $this-> horas_laboratorio,
			'horas_otros' => $this-> horas_otros,
			'id_cursos' => $this-> id_cursos
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Materia Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Materia::where('id', $id)->delete();
        }
    }
}