<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Titulo;
use App\Models\Docente;

class Titulos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_docente, $fecha, $ies, $nombre, $observaciones, $principal;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
		$docentes = Docente::all();
        return view('livewire.titulos.view', [
            'titulos' => Titulo::latest()
						->orWhere('id_docente', 'LIKE', $keyWord)
						->orWhere('fecha', 'LIKE', $keyWord)
						->orWhere('ies', 'LIKE', $keyWord)
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('observaciones', 'LIKE', $keyWord)
						->orWhere('principal', 'LIKE', $keyWord)
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
		$this->fecha = null;
		$this->ies = null;
		$this->nombre = null;
		$this->observaciones = null;
		$this->principal = null;
    }

    public function store()
	{
    	$this->validate([
        	'id_docente' => 'required',
        	'fecha' => 'required',
        	'ies' => 'required',
        	'nombre' => 'required',
        	'observaciones' => 'required',
			//'principal' => 'required',
   		]);

    	$existingTitulo = Titulo::where('id_docente', $this->id_docente)->first();

    	// Verificar si ya hay un título existente para el docente
    	$principal = $existingTitulo ? 0 : 1;

    	Titulo::create([
        	'id_docente' => $this->id_docente,
        	'fecha' => $this->fecha,
        	'ies' => $this->ies,
        	'nombre' => $this->nombre,
        	'observaciones' => $this->observaciones,
        	'principal' => $principal,
    	]);

    	$this->resetInput();
    	$this->dispatchBrowserEvent('closeModal');
    	session()->flash('message', 'Título agregado exitosamente.');
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
		//$this->principal = $record-> principal;
    }

    public function update()
    {
        $this->validate([
		'id_docente' => 'required',
		'fecha' => 'required',
		'ies' => 'required',
		'nombre' => 'required',
		'observaciones' => 'required',
		//'principal' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Titulo::find($this->selected_id);
            $record->update([ 
			'id_docente' => $this-> id_docente,
			'fecha' => $this-> fecha,
			'ies' => $this-> ies,
			'nombre' => $this-> nombre,
			'observaciones' => $this-> observaciones,
			'principal' => $this-> principal
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Titulo editado exitosamente.');
        }
    }

    public function destroy($id)
	{
    	if ($id) {
        	$record = Titulo::find($id);

        	// Verificar si el título a eliminar tiene principal=1
        	if ($record && $record->principal == 1) {
            	// Encontrar el siguiente título del mismo docente y asignarle principal=1
            	$nextTitulo = Titulo::where('id_docente', $record->id_docente)
                	->where('id', '>', $id)
                	->orderBy('id')
                	->first();

            	if ($nextTitulo) {
                	$nextTitulo->update(['principal' => 1]);
            	}
        	}

        	// Eliminar el título
        	Titulo::where('id', $id)->delete();
    	}
	}

}