<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Areadeconocimiento;

class Areadeconocimientos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_docente, $id_area;

    public function render()
    {
        $docentes = \App\Models\Docente::all();
        $areas = \App\Models\areasconocimientosopcione::all();
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.areadeconocimientos.view', [
            'areadeconocimientos' => Areadeconocimiento::latest()
						->orWhere('id_docente', 'LIKE', $keyWord)
						->orWhere('id_area', 'LIKE', $keyWord)
						->paginate(10),
                        'docentes' => $docentes,
                        'areas' => $areas,
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->id_docente = null;
		$this->id_area = null;
    }

    public function store()
    {
        $this->validate([
		'id_docente' => 'required',
		'id_area' => 'required',
        ]);

        Areadeconocimiento::create([ 
			'id_docente' => $this-> id_docente,
			'id_area' => $this-> id_area
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Areadeconocimiento Successfully created.');
    }

    public function edit($id)
    {
        $record = Areadeconocimiento::findOrFail($id);
        $this->selected_id = $id; 
		$this->id_docente = $record-> id_docente;
		$this->id_area = $record-> id_area;
    }

    public function update()
    {
        $this->validate([
		'id_docente' => 'required',
		'id_area' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Areadeconocimiento::find($this->selected_id);
            $record->update([ 
			'id_docente' => $this-> id_docente,
			'id_area' => $this-> id_area
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Areadeconocimiento Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Areadeconocimiento::where('id', $id)->delete();
        }
    }
}