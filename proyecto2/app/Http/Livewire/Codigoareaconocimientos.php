<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Codigoareaconocimiento;
use App\Models\AreaConocimiento;
use App\Models\Grado;

class Codigoareaconocimientos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $codigo, $id_grado, $id_areaconocimiento;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        $areas = AreaConocimiento::all();
        $grados = Grado::all();
        return view('livewire.codigoareaconocimientos.view', [
            'codigoareaconocimientos' => Codigoareaconocimiento::latest()
						->orWhere('codigo', 'LIKE', $keyWord)
						->orWhere('id_grado', 'LIKE', $keyWord)
						->orWhere('id_areaconocimiento', 'LIKE', $keyWord)
						->paginate(10),
            'areas' => $areas,
            'grados' => $grados,
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->codigo = null;
		$this->id_grado = null;
		$this->id_areaconocimiento = null;
    }

    public function store()
    {
        $this->validate([
		'codigo' => 'required',
		'id_grado' => 'required',
		'id_areaconocimiento' => 'required',
        ]);

        Codigoareaconocimiento::create([ 
			'codigo' => $this-> codigo,
			'id_grado' => $this-> id_grado,
			'id_areaconocimiento' => $this-> id_areaconocimiento
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Código creado exitosamente.');
    }

    public function edit($id)
    {
        $record = Codigoareaconocimiento::findOrFail($id);
        $this->selected_id = $id; 
		$this->codigo = $record-> codigo;
		$this->id_grado = $record-> id_grado;
		$this->id_areaconocimiento = $record-> id_areaconocimiento;
    }

    public function update()
    {
        $this->validate([
		'codigo' => 'required',
		'id_grado' => 'required',
		'id_areaconocimiento' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Codigoareaconocimiento::find($this->selected_id);
            $record->update([ 
			'codigo' => $this-> codigo,
			'id_grado' => $this-> id_grado,
			'id_areaconocimiento' => $this-> id_areaconocimiento
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Código editado exitosamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Codigoareaconocimiento::where('id', $id)->delete();
        }
    }
}