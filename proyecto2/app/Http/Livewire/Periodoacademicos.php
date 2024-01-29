<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Periodoacademico;
use App\Models\Grado;
use App\Models\Sigla;

class Periodoacademicos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_grado, $id_sigla, $fecha_inicio, $fecha_fin;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        $grados = Grado::all();
        $siglas = Sigla::all();
        return view('livewire.periodoacademicos.view', [
            'periodoacademicos' => Periodoacademico::latest()
						->orWhere('id_grado', 'LIKE', $keyWord)
						->orWhere('id_sigla', 'LIKE', $keyWord)
						->orWhere('fecha_inicio', 'LIKE', $keyWord)
						->orWhere('fecha_fin', 'LIKE', $keyWord)
						->paginate(10),
            'grados' => $grados,
            'siglas' => $siglas
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->id_grado = null;
		$this->id_sigla = null;
		$this->fecha_inicio = null;
		$this->fecha_fin = null;
    }

    public function store()
    {
        $this->validate([
		'id_grado' => 'required',
		'id_sigla' => 'required',
		'fecha_inicio' => 'required',
		'fecha_fin' => 'required',
        ]);

        Periodoacademico::create([ 
			'id_grado' => $this-> id_grado,
			'id_sigla' => $this-> id_sigla,
			'fecha_inicio' => $this-> fecha_inicio,
			'fecha_fin' => $this-> fecha_fin
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Periodo académico creado exitosamente.');
    }

    public function edit($id)
    {
        $record = Periodoacademico::findOrFail($id);
        $this->selected_id = $id; 
		$this->id_grado = $record-> id_grado;
		$this->id_sigla = $record-> id_sigla;
		$this->fecha_inicio = $record-> fecha_inicio;
		$this->fecha_fin = $record-> fecha_fin;
    }

    public function update()
    {
        $this->validate([
		'id_grado' => 'required',
		'id_sigla' => 'required',
		'fecha_inicio' => 'required',
		'fecha_fin' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Periodoacademico::find($this->selected_id);
            $record->update([ 
			'id_grado' => $this-> id_grado,
			'id_sigla' => $this-> id_sigla,
			'fecha_inicio' => $this-> fecha_inicio,
			'fecha_fin' => $this-> fecha_fin
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Periodo académico creado exitosamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Periodoacademico::where('id', $id)->delete();
        }
    }
}