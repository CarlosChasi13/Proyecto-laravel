<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Areasconocimientosopcione;

class Areasconocimientosopciones extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $codigo, $nombre;

    public function render()
    {
        $areacon = \App\Models\Areasconocimientosopcione::all();
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.areasconocimientosopciones.view', [
            'areasconocimientosopciones' => Areasconocimientosopcione::latest()
						->orWhere('codigo', 'LIKE', $keyWord)
						->orWhere('nombre', 'LIKE', $keyWord)
						->paginate(10),
                        'reacon' => $areacon,
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->codigo = null;
		$this->nombre = null;
    }

    public function store()
    {
        $this->validate([
		'codigo' => 'required',
		'nombre' => 'required',
        ]);

        Areasconocimientosopcione::create([ 
			'codigo' => $this-> codigo,
			'nombre' => $this-> nombre
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Areasconocimientosopcione Successfully created.');
    }

    public function edit($id)
    {
        $record = Areasconocimientosopcione::findOrFail($id);
        $this->selected_id = $id; 
		$this->codigo = $record-> codigo;
		$this->nombre = $record-> nombre;
    }

    public function update()
    {
        $this->validate([
		'codigo' => 'required',
		'nombre' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Areasconocimientosopcione::find($this->selected_id);
            $record->update([ 
			'codigo' => $this-> codigo,
			'nombre' => $this-> nombre
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Areasconocimientosopcione Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Areasconocimientosopcione::where('id', $id)->delete();
        }
    }
}