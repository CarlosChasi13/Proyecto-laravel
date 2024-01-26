<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Titulo;

class Titulos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_docente, $fecha, $ies, $nombre, $observaciones;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.titulos.view', [
            'titulos' => Titulo::latest()
						->orWhere('id_docente', 'LIKE', $keyWord)
						->orWhere('fecha', 'LIKE', $keyWord)
						->orWhere('ies', 'LIKE', $keyWord)
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('observaciones', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->id_docente = null;
		$this->fecha = null;
		$this->ies = null;
		$this->nombre = null;
		$this->observaciones = null;
    }

    public function store()
    {
        $this->validate([
		'id_docente' => 'required',
		'fecha' => 'required',
		'ies' => 'required',
		'nombre' => 'required',
		'observaciones' => 'required',
        ]);

        Titulo::create([ 
			'id_docente' => $this-> id_docente,
			'fecha' => $this-> fecha,
			'ies' => $this-> ies,
			'nombre' => $this-> nombre,
			'observaciones' => $this-> observaciones
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Titulo Successfully created.');
    }

    public function edit($id)
    {
        $record = Titulo::findOrFail($id);
        $this->selected_id = $id; 
		$this->id_docente = $record-> id_docente;
		$this->fecha = $record-> fecha;
		$this->ies = $record-> ies;
		$this->nombre = $record-> nombre;
		$this->observaciones = $record-> observaciones;
    }

    public function update()
    {
        $this->validate([
		'id_docente' => 'required',
		'fecha' => 'required',
		'ies' => 'required',
		'nombre' => 'required',
		'observaciones' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Titulo::find($this->selected_id);
            $record->update([ 
			'id_docente' => $this-> id_docente,
			'fecha' => $this-> fecha,
			'ies' => $this-> ies,
			'nombre' => $this-> nombre,
			'observaciones' => $this-> observaciones
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Titulo Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Titulo::where('id', $id)->delete();
        }
    }
}