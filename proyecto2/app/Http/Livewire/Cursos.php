<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Curso;

class Cursos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $Nombre;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.cursos.view', [
            'cursos' => Curso::latest()
						->orWhere('Nombre', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->Nombre = null;
    }

    public function store()
    {
        $this->validate([
		'Nombre' => 'required',
        ]);

        Curso::create([ 
			'Nombre' => $this-> Nombre
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Curso Successfully created.');
    }

    public function edit($id)
    {
        $record = Curso::findOrFail($id);
        $this->selected_id = $id; 
		$this->Nombre = $record-> Nombre;
    }

    public function update()
    {
        $this->validate([
		'Nombre' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Curso::find($this->selected_id);
            $record->update([ 
			'Nombre' => $this-> Nombre
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Curso Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Curso::where('id', $id)->delete();
        }
    }
}