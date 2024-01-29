<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Areaintere;
use App\Models\Docente;
use App\Models\Areaconocimiento;

class Areainteres extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_docente, $id_areaconocimiento, $tema, $descripcion;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        $docentes = Docente::all();
        $areas= Areaconocimiento::all();
        return view('livewire.areainteres.view', [
            'areainteres' => Areaintere::latest()
						->orWhere('id_docente', 'LIKE', $keyWord)
						->orWhere('id_areaconocimiento', 'LIKE', $keyWord)
						->orWhere('tema', 'LIKE', $keyWord)
						->orWhere('descripcion', 'LIKE', $keyWord)
						->paginate(10),
            'docentes' => $docentes,
            'areas' => $areas,22
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->id_docente = null;
		$this->id_areaconocimiento = null;
		$this->tema = null;
		$this->descripcion = null;
    }

    public function store()
    {
        $this->validate([
		'id_docente' => 'required',
		'id_areaconocimiento' => 'required',
		'tema' => 'required',
		'descripcion' => 'required',
        ]);

        Areaintere::create([ 
			'id_docente' => $this-> id_docente,
			'id_areaconocimiento' => $this-> id_areaconocimiento,
			'tema' => $this-> tema,
			'descripcion' => $this-> descripcion
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Área de interés2 agregada exitosamente.');
    }

    public function edit($id)
    {
        $record = Areaintere::findOrFail($id);
        $this->selected_id = $id; 
		$this->id_docente = $record-> id_docente;
		$this->id_areaconocimiento = $record-> id_areaconocimiento;
		$this->tema = $record-> tema;
		$this->descripcion = $record-> descripcion;
    }

    public function update()
    {
        $this->validate([
		'id_docente' => 'required',
		'id_areaconocimiento' => 'required',
		'tema' => 'required',
		'descripcion' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Areaintere::find($this->selected_id);
            $record->update([ 
			'id_docente' => $this-> id_docente,
			'id_areaconocimiento' => $this-> id_areaconocimiento,
			'tema' => $this-> tema,
			'descripcion' => $this-> descripcion
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Área de interés editada exitosamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Areaintere::where('id', $id)->delete();
        }
    }
}