<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Areaintere;
use App\Models\Docente;

class Areainteres extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $tema, $descripcion, $id_docente;
    

    public function render()
    {
        $docentes = \App\Models\Docente::all();
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.areainteres.view', [
            'areainteres' => Areaintere::latest()
						->orWhere('tema', 'LIKE', $keyWord)
						->orWhere('descripcion', 'LIKE', $keyWord)
						->orWhere('id_docente', 'LIKE', $keyWord)
						->paginate(10),
<<<<<<< HEAD
                        'docentes' => $docentes,
                                    
                        
=======
                        'id_docente' => Docente::all(),
>>>>>>> 69430cfd37a34485ab36f754f3e2e22d3235094d
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->tema = null;
		$this->descripcion = null;
		$this->id_docente = null;
    }

    public function store()
    {
        $this->validate([
		'tema' => 'required',
		'descripcion' => 'required',
		'id_docente' => 'required',
        ]);

        Areaintere::create([ 
			'tema' => $this-> tema,
			'descripcion' => $this-> descripcion,
			'id_docente' => $this-> id_docente
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Areaintere Successfully created.');
    }

    public function edit($id)
    {
        $record = Areaintere::findOrFail($id);
        $this->selected_id = $id; 
		$this->tema = $record-> tema;
		$this->descripcion = $record-> descripcion;
		$this->id_docente = $record-> id_docente;
    }

    public function update()
    {
        $this->validate([
		'tema' => 'required',
		'descripcion' => 'required',
		'id_docente' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Areaintere::find($this->selected_id);
            $record->update([ 
			'tema' => $this-> tema,
			'descripcion' => $this-> descripcion,
			'id_docente' => $this-> id_docente
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Areaintere Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Areaintere::where('id', $id)->delete();
        }
    }
}