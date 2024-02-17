<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Publicacioncientifica;
use App\Models\Docente;

class Publicacioncientificas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_docente, $nombre, $año, $ies, $observaciones;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        $docentes = Docente::all();
        return view('livewire.publicacioncientificas.view', [
            'publicacioncientificas' => Publicacioncientifica::latest()
						->orWhere('id_docente', 'LIKE', $keyWord)
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('año', 'LIKE', $keyWord)
						->orWhere('ies', 'LIKE', $keyWord)
						->orWhere('observaciones', 'LIKE', $keyWord)
						->paginate(10),
            'docentes' => $docentes,
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->id_docente = null;
		$this->nombre = null;
		$this->año = null;
		$this->ies = null;
		$this->observaciones = null;
    }

    public function store()
    {
        $this->validate([
		'id_docente' => 'required',
		'nombre' => 'required',
		'año' => 'required|regex:/^\d{4}$/',
		'ies' => 'required',
		'observaciones' => 'required',
        ]);

        Publicacioncientifica::create([ 
			'id_docente' => $this-> id_docente,
			'nombre' => $this-> nombre,
			'año' => $this-> año,
			'ies' => $this-> ies,
			'observaciones' => $this-> observaciones
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Publicación científica agregada exitosamente.');
    }

    public function edit($id)
    {
        $record = Publicacioncientifica::findOrFail($id);
        $this->selected_id = $id; 
		$this->id_docente = $record-> id_docente;
		$this->nombre = $record-> nombre;
		$this->año = $record-> año;
		$this->ies = $record-> ies;
		$this->observaciones = $record-> observaciones;
    }

    public function update()
    {
        $this->validate([
		'id_docente' => 'required',
		'nombre' => 'required',
		'año' => 'required|regex:/^\d{4}$/',
		'ies' => 'required',
		'observaciones' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Publicacioncientifica::find($this->selected_id);
            $record->update([ 
			'id_docente' => $this-> id_docente,
			'nombre' => $this-> nombre,
			'año' => $this-> año,
			'ies' => $this-> ies,
			'observaciones' => $this-> observaciones
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Publicación cientificaeditada exitosamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Publicacioncientifica::where('id', $id)->delete();
        }
    }
}