<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Materia;
use App\Models\Curso;

class Materias extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $codigo, $id_curso, $nombre, $descripcion, $horas_creditos, $horas_teoria, $horas_laboratorio, $horas_otros;

    public function render()
    {
<<<<<<< HEAD
		$curso=\App\Models\Curso::all();
=======
		$cursos = Curso::all();
>>>>>>> 5c9de0ab08d1111aa4f472e80291b0aa210fd56c
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.materias.view', [
            'materias' => Materia::latest()
						->orWhere('codigo', 'LIKE', $keyWord)
						->orWhere('id_curso', 'LIKE', $keyWord)
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('descripcion', 'LIKE', $keyWord)
						->orWhere('horas_creditos', 'LIKE', $keyWord)
						->orWhere('horas_teoria', 'LIKE', $keyWord)
						->orWhere('horas_laboratorio', 'LIKE', $keyWord)
						->orWhere('horas_otros', 'LIKE', $keyWord)
						->paginate(10),
<<<<<<< HEAD
			'curso'=>$curso,
				
=======
			'cursos' => $cursos,
>>>>>>> 5c9de0ab08d1111aa4f472e80291b0aa210fd56c
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->codigo = null;
		$this->id_curso = null;
		$this->nombre = null;
		$this->descripcion = null;
		$this->horas_creditos = null;
		$this->horas_teoria = null;
		$this->horas_laboratorio = null;
		$this->horas_otros = null;
    }

    public function store()
    {
        $this->validate([
		'codigo' => 'required',
		'id_curso' => 'required',
		'nombre' => 'required',
		'descripcion' => 'required',
		'horas_creditos' => 'required',
		'horas_teoria' => 'required',
		'horas_laboratorio' => 'required',
		'horas_otros' => 'required',
        ]);

        Materia::create([ 
			'codigo' => $this-> codigo,
			'id_curso' => $this-> id_curso,
			'nombre' => $this-> nombre,
			'descripcion' => $this-> descripcion,
			'horas_creditos' => $this-> horas_creditos,
			'horas_teoria' => $this-> horas_teoria,
			'horas_laboratorio' => $this-> horas_laboratorio,
			'horas_otros' => $this-> horas_otros
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
		$this->id_curso = $record-> id_curso;
		$this->nombre = $record-> nombre;
		$this->descripcion = $record-> descripcion;
		$this->horas_creditos = $record-> horas_creditos;
		$this->horas_teoria = $record-> horas_teoria;
		$this->horas_laboratorio = $record-> horas_laboratorio;
		$this->horas_otros = $record-> horas_otros;
    }

    public function update()
    {
        $this->validate([
		'codigo' => 'required',
		'id_curso' => 'required',
		'nombre' => 'required',
		'descripcion' => 'required',
		'horas_creditos' => 'required',
		'horas_teoria' => 'required',
		'horas_laboratorio' => 'required',
		'horas_otros' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Materia::find($this->selected_id);
            $record->update([ 
			'codigo' => $this-> codigo,
			'id_curso' => $this-> id_curso,
			'nombre' => $this-> nombre,
			'descripcion' => $this-> descripcion,
			'horas_creditos' => $this-> horas_creditos,
			'horas_teoria' => $this-> horas_teoria,
			'horas_laboratorio' => $this-> horas_laboratorio,
			'horas_otros' => $this-> horas_otros
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