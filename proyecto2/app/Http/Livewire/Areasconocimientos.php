<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Areasconocimiento;

class Areasconocimientos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_docentes, $id_area_con;

    public function render()
    {
        $docentes = \App\Models\Docente::all();
        $areas=\App\Models\Areasconocimientosopcione::all();
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.areasconocimientos.view', [
            'areasconocimientos' => Areasconocimiento::latest()
						->orWhere('id_docentes', 'LIKE', $keyWord)
						->orWhere('id_area_con', 'LIKE', $keyWord)
						->paginate(10),
                    'docentes'=>$docentes,
                    'areas'=>$areas,

        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->id_docentes = null;
		$this->id_area_con = null;
    }

    public function store()
    {
        $this->validate([
		'id_docentes' => 'required',
		'id_area_con' => 'required',
        ]);

        Areasconocimiento::create([ 
			'id_docentes' => $this-> id_docentes,
			'id_area_con' => $this-> id_area_con
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Areasconocimiento Successfully created.');
    }

    public function edit($id)
    {
        $record = Areasconocimiento::findOrFail($id);
        $this->selected_id = $id; 
		$this->id_docentes = $record-> id_docentes;
		$this->id_area_con = $record-> id_area_con;
    }

    public function update()
    {
        $this->validate([
		'id_docentes' => 'required',
		'id_area_con' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Areasconocimiento::find($this->selected_id);
            $record->update([ 
			'id_docentes' => $this-> id_docentes,
			'id_area_con' => $this-> id_area_con
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Areasconocimiento Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Areasconocimiento::where('id', $id)->delete();
        }
    }
}