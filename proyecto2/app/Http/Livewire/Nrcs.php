<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Nrc;
use App\Models\Sede;
use App\Models\Asignatura;
use App\Models\Docente;

class Nrcs extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_sede, $id_asignatura, $id_docente;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        $sedes = Sede::all();
        $asignaturas = Asignatura::all();
        $docentes = Docente::all();
        return view('livewire.nrcs.view', [
            'nrcs' => Nrc::latest()
						->orWhere('id_sede', 'LIKE', $keyWord)
						->orWhere('id_asignatura', 'LIKE', $keyWord)
						->orWhere('id_docente', 'LIKE', $keyWord)
						->paginate(10),
            'sedes' => $sedes,
            'asignaturas' => $asignaturas,
            'docentes' => $docentes,
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->id_sede = null;
		$this->id_asignatura = null;
		$this->id_docente = null;
    }

    public function store()
    {
        $this->validate([
		'id_sede' => 'required',
		'id_asignatura' => 'required',
		'id_docente' => 'required',
        ]);

        Nrc::create([ 
			'id_sede' => $this-> id_sede,
			'id_asignatura' => $this-> id_asignatura,
			'id_docente' => $this-> id_docente
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Nrc creado exitosamente.');
    }

    public function edit($id)
    {
        $record = Nrc::findOrFail($id);
        $this->selected_id = $id; 
		$this->id_sede = $record-> id_sede;
		$this->id_asignatura = $record-> id_asignatura;
		$this->id_docente = $record-> id_docente;
    }

    public function update()
    {
        $this->validate([
		'id_sede' => 'required',
		'id_asignatura' => 'required',
		'id_docente' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Nrc::find($this->selected_id);
            $record->update([ 
			'id_sede' => $this-> id_sede,
			'id_asignatura' => $this-> id_asignatura,
			'id_docente' => $this-> id_docente
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Nrc editado exitosamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Nrc::where('id', $id)->delete();
        }
    }
}