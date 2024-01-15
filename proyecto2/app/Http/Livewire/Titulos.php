<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Titulo;

class Titulos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $fecha, $ies, $nombre_titulo, $observaciones, $id_docente;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.titulos.view', [
            'titulos' => Titulo::latest()
						->orWhere('fecha', 'LIKE', $keyWord)
						->orWhere('ies', 'LIKE', $keyWord)
						->orWhere('nombre_titulo', 'LIKE', $keyWord)
						->orWhere('observaciones', 'LIKE', $keyWord)
						->orWhere('id_docente', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->fecha = null;
		$this->ies = null;
		$this->nombre_titulo = null;
		$this->observaciones = null;
		$this->id_docente = null;
    }

    public function store()
    {
        $this->validate([
		'fecha' => 'required',
		'ies' => 'required',
		'nombre_titulo' => 'required',
		'observaciones' => 'required',
		'id_docente' => 'required',
        ]);

        Titulo::create([ 
			'fecha' => $this-> fecha,
			'ies' => $this-> ies,
			'nombre_titulo' => $this-> nombre_titulo,
			'observaciones' => $this-> observaciones,
			'id_docente' => $this-> id_docente
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Titulo Successfully created.');
    }

    public function edit($id)
    {
        $record = Titulo::findOrFail($id);
        $this->selected_id = $id; 
		$this->fecha = $record-> fecha;
		$this->ies = $record-> ies;
		$this->nombre_titulo = $record-> nombre_titulo;
		$this->observaciones = $record-> observaciones;
		$this->id_docente = $record-> id_docente;
    }

    public function update()
    {
        $this->validate([
		'fecha' => 'required',
		'ies' => 'required',
		'nombre_titulo' => 'required',
		'observaciones' => 'required',
		'id_docente' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Titulo::find($this->selected_id);
            $record->update([ 
			'fecha' => $this-> fecha,
			'ies' => $this-> ies,
			'nombre_titulo' => $this-> nombre_titulo,
			'observaciones' => $this-> observaciones,
			'id_docente' => $this-> id_docente
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