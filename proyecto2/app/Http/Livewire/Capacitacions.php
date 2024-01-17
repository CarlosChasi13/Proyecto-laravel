<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Capacitacion;

class Capacitacions extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $titulo, $ies, $horas, $fecha, $descripcion, $id_docente;

    public function render()
    {
		$docentes = \App\Models\Docente::all();
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.capacitacions.view', [
            'capacitacions' => Capacitacion::latest()
						->orWhere('titulo', 'LIKE', $keyWord)
						->orWhere('ies', 'LIKE', $keyWord)
						->orWhere('horas', 'LIKE', $keyWord)
						->orWhere('fecha', 'LIKE', $keyWord)
						->orWhere('descripcion', 'LIKE', $keyWord)
						->orWhere('id_docente', 'LIKE', $keyWord)
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
		$this->titulo = null;
		$this->ies = null;
		$this->horas = null;
		$this->fecha = null;
		$this->descripcion = null;
		$this->id_docente = null;
    }

    public function store()
    {
        $this->validate([
		'titulo' => 'required',
		'ies' => 'required',
		'horas' => 'required',
		'fecha' => 'required',
		'descripcion' => 'required',
		'id_docente' => 'required',
        ]);

        Capacitacion::create([ 
			'titulo' => $this-> titulo,
			'ies' => $this-> ies,
			'horas' => $this-> horas,
			'fecha' => $this-> fecha,
			'descripcion' => $this-> descripcion,
			'id_docente' => $this-> id_docente
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Capacitacion Successfully created.');
    }

    public function edit($id)
    {
        $record = Capacitacion::findOrFail($id);
        $this->selected_id = $id; 
		$this->titulo = $record-> titulo;
		$this->ies = $record-> ies;
		$this->horas = $record-> horas;
		$this->fecha = $record-> fecha;
		$this->descripcion = $record-> descripcion;
		$this->id_docente = $record-> id_docente;
    }

    public function update()
    {
        $this->validate([
		'titulo' => 'required',
		'ies' => 'required',
		'horas' => 'required',
		'fecha' => 'required',
		'descripcion' => 'required',
		'id_docente' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Capacitacion::find($this->selected_id);
            $record->update([ 
			'titulo' => $this-> titulo,
			'ies' => $this-> ies,
			'horas' => $this-> horas,
			'fecha' => $this-> fecha,
			'descripcion' => $this-> descripcion,
			'id_docente' => $this-> id_docente
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Capacitacion Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Capacitacion::where('id', $id)->delete();
        }
    }
}