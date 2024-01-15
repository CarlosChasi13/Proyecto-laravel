<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Responsabilidadopcione;

class Responsabilidadopciones extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $cargo, $descripcion;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.responsabilidadopciones.view', [
            'responsabilidadopciones' => Responsabilidadopcione::latest()
						->orWhere('cargo', 'LIKE', $keyWord)
						->orWhere('descripcion', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->cargo = null;
		$this->descripcion = null;
    }

    public function store()
    {
        $this->validate([
		'cargo' => 'required',
		'descripcion' => 'required',
        ]);

        Responsabilidadopcione::create([ 
			'cargo' => $this-> cargo,
			'descripcion' => $this-> descripcion
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Responsabilidadopcione Successfully created.');
    }

    public function edit($id)
    {
        $record = Responsabilidadopcione::findOrFail($id);
        $this->selected_id = $id; 
		$this->cargo = $record-> cargo;
		$this->descripcion = $record-> descripcion;
    }

    public function update()
    {
        $this->validate([
		'cargo' => 'required',
		'descripcion' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Responsabilidadopcione::find($this->selected_id);
            $record->update([ 
			'cargo' => $this-> cargo,
			'descripcion' => $this-> descripcion
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Responsabilidadopcione Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Responsabilidadopcione::where('id', $id)->delete();
        }
    }
}