<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Responsabilidad;

class Responsabilidads extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_docente, $id_responsabilidad;

    public function render()
    {
        $docentes = \App\Models\Docente::all();
        $responsabilidades = \App\Models\Responsabilidadopcione::all();
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.responsabilidads.view', [
            'responsabilidads' => Responsabilidad::latest()
						->orWhere('id_docente', 'LIKE', $keyWord)
						->orWhere('id_responsabilidad', 'LIKE', $keyWord)
						->paginate(10),
                    'docentes'=>$docentes,
                    'responsabilidades'=>$responsabilidades,
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->id_docente = null;
		$this->id_responsabilidad = null;
    }

    public function store()
    {
        $this->validate([
		'id_docente' => 'required',
		'id_responsabilidad' => 'required',
        ]);

        Responsabilidad::create([ 
			'id_docente' => $this-> id_docente,
			'id_responsabilidad' => $this-> id_responsabilidad
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Responsabilidad Successfully created.');
    }

    public function edit($id)
    {
        $record = Responsabilidad::findOrFail($id);
        $this->selected_id = $id; 
		$this->id_docente = $record-> id_docente;
		$this->id_responsabilidad = $record-> id_responsabilidad;
    }

    public function update()
    {
        $this->validate([
		'id_docente' => 'required',
		'id_responsabilidad' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Responsabilidad::find($this->selected_id);
            $record->update([ 
			'id_docente' => $this-> id_docente,
			'id_responsabilidad' => $this-> id_responsabilidad
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Responsabilidad Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Responsabilidad::where('id', $id)->delete();
        }
    }
}