<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Rol;

class Rols extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $descripcion;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.rols.view', [
            'rols' => Rol::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
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
		$this->nombre = null;
		$this->descripcion = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'descripcion' => 'required',
        ]);

        Rol::create([ 
			'nombre' => $this-> nombre,
			'descripcion' => $this-> descripcion
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Rol Successfully created.');
    }

    public function edit($id)
    {
        $record = Rol::findOrFail($id);
        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
		$this->descripcion = $record-> descripcion;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		'descripcion' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Rol::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre,
			'descripcion' => $this-> descripcion
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Rol Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Rol::where('id', $id)->delete();
        }
    }
}