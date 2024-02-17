<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Docenteareaconocimiento;
use App\Models\Docente;
use App\Models\Codigoareaconocimiento;



class Docenteareaconocimientos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_docente, $id_codigoareaconocimiento;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        $docentes = Docente::all();
        $codigoAreaConocimientos=Codigoareaconocimiento::all();
        return view('livewire.docenteareaconocimientos.view', [
            'docenteareaconocimientos' => Docenteareaconocimiento::latest()
						->orWhere('id_docente', 'LIKE', $keyWord)
						->orWhere('id_codigoareaconocimiento', 'LIKE', $keyWord)
						->paginate(10),
            'docentes' => $docentes,
            'codigoAreaConocimientos'=>$codigoAreaConocimientos,
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->id_docente = null;
		$this->id_codigoareaconocimiento = null;
    }

    public function store()
    {
        $this->validate([
		'id_docente' => 'required',
		'id_codigoareaconocimiento' => 'required',
        ]);

        Docenteareaconocimiento::create([ 
			'id_docente' => $this-> id_docente,
			'id_codigoareaconocimiento' => $this-> id_codigoareaconocimiento
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Área asignada a docente exitosamente.');
    }

    public function edit($id)
    {
        $record = Docenteareaconocimiento::findOrFail($id);
        $this->selected_id = $id; 
		$this->id_docente = $record-> id_docente;
		$this->id_codigoareaconocimiento = $record-> id_codigoareaconocimiento;
    }

    public function update()
    {
        $this->validate([
		'id_docente' => 'required',
		'id_codigoareaconocimiento' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Docenteareaconocimiento::find($this->selected_id);
            $record->update([ 
			'id_docente' => $this-> id_docente,
			'id_codigoareaconocimiento' => $this-> id_codigoareaconocimiento
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Ásignación editada exitosamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Docenteareaconocimiento::where('id', $id)->delete();
        }
    }
}