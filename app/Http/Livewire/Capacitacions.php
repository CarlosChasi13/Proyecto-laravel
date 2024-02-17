<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Capacitacion;
use App\Models\Docente;

class Capacitacions extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_docente, $ies, $nombre, $fecha, $horas, $descripcion;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
		$docentes = Docente::all();
        return view('livewire.capacitacions.view', [
            'capacitacions' => Capacitacion::latest()
						->orWhere('id_docente', 'LIKE', $keyWord)
						->orWhere('ies', 'LIKE', $keyWord)
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('fecha', 'LIKE', $keyWord)
						->orWhere('horas', 'LIKE', $keyWord)
						->orWhere('descripcion', 'LIKE', $keyWord)
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
		$this->ies = null;
		$this->nombre = null;
		$this->fecha = null;
		$this->horas = null;
		$this->descripcion = null;
    }

    public function store()
    {
        $this->validate([
		'id_docente' => 'required',
		'ies' => 'required',
		'nombre' => 'required',
		'fecha' => 'required',
		'horas' => 'required|integer',
		'descripcion' => 'required',
        ]);

        Capacitacion::create([ 
			'id_docente' => $this-> id_docente,
			'ies' => $this-> ies,
			'nombre' => $this-> nombre,
			'fecha' => $this-> fecha,
			'horas' => $this-> horas,
			'descripcion' => $this-> descripcion
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Capacitación agregada exitosamente.');
    }

    public function edit($id)
    {
        $record = Capacitacion::findOrFail($id);
        $this->selected_id = $id; 
		$this->id_docente = $record-> id_docente;
		$this->ies = $record-> ies;
		$this->nombre = $record-> nombre;
		$this->fecha = $record-> fecha;
		$this->horas = $record-> horas;
		$this->descripcion = $record-> descripcion;
    }

    public function update()
    {
        $this->validate([
		'id_docente' => 'required',
		'ies' => 'required',
		'nombre' => 'required',
		'fecha' => 'required',
		'horas' => 'required|integer',
		'descripcion' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Capacitacion::find($this->selected_id);
            $record->update([ 
			'id_docente' => $this-> id_docente,
			'ies' => $this-> ies,
			'nombre' => $this-> nombre,
			'fecha' => $this-> fecha,
			'horas' => $this-> horas,
			'descripcion' => $this-> descripcion
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Capacitación editada exitosamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Capacitacion::where('id', $id)->delete();
        }
    }
}