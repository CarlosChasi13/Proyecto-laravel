<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Rol;

class Rols extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $descripcion, $id_docente, $id_rol;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.rols.view', [
            'rols' => Rol::latest()
						->orWhere('descripcion', 'LIKE', $keyWord)
						->orWhere('id_docente', 'LIKE', $keyWord)
						->orWhere('id_rol', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->descripcion = null;
		$this->id_docente = null;
		$this->id_rol = null;
    }

    public function store()
    {
        $this->validate([
		'descripcion' => 'required',
		'id_docente' => 'required',
		'id_rol' => 'required',
        ]);

        Rol::create([ 
			'descripcion' => $this-> descripcion,
			'id_docente' => $this-> id_docente,
			'id_rol' => $this-> id_rol
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Rol Successfully created.');
    }

    public function edit($id)
    {
        $record = Rol::findOrFail($id);
        $this->selected_id = $id; 
		$this->descripcion = $record-> descripcion;
		$this->id_docente = $record-> id_docente;
		$this->id_rol = $record-> id_rol;
    }

    public function update()
    {
        $this->validate([
		'descripcion' => 'required',
		'id_docente' => 'required',
		'id_rol' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Rol::find($this->selected_id);
            $record->update([ 
			'descripcion' => $this-> descripcion,
			'id_docente' => $this-> id_docente,
			'id_rol' => $this-> id_rol
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