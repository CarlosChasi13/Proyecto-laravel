<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Publicacioncientifica;

class Publicacioncientificas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $doi, $titulo, $anio, $ies, $autor, $id_docente;

    public function render()
    {
		$docentes = \App\Models\Docente::all();
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.publicacioncientificas.view', [
            'publicacioncientificas' => Publicacioncientifica::latest()
						->orWhere('doi', 'LIKE', $keyWord)
						->orWhere('titulo', 'LIKE', $keyWord)
						->orWhere('anio', 'LIKE', $keyWord)
						->orWhere('ies', 'LIKE', $keyWord)
						->orWhere('autor', 'LIKE', $keyWord)
						->orWhere('id_docente', 'LIKE', $keyWord)
						->paginate(10),
						'docentes'=>$docentes,
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->doi = null;
		$this->titulo = null;
		$this->anio = null;
		$this->ies = null;
		$this->autor = null;
		$this->id_docente = null;
    }

    public function store()
    {
        $this->validate([
		'doi' => 'required',
		'titulo' => 'required',
		'anio' => 'required',
		'ies' => 'required',
		'autor' => 'required',
		'id_docente' => 'required',
        ]);

        Publicacioncientifica::create([ 
			'doi' => $this-> doi,
			'titulo' => $this-> titulo,
			'anio' => $this-> anio,
			'ies' => $this-> ies,
			'autor' => $this-> autor,
			'id_docente' => $this-> id_docente
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Publicacioncientifica Successfully created.');
    }

    public function edit($id)
    {
        $record = Publicacioncientifica::findOrFail($id);
        $this->selected_id = $id; 
		$this->doi = $record-> doi;
		$this->titulo = $record-> titulo;
		$this->anio = $record-> anio;
		$this->ies = $record-> ies;
		$this->autor = $record-> autor;
		$this->id_docente = $record-> id_docente;
    }

    public function update()
    {
        $this->validate([
		'doi' => 'required',
		'titulo' => 'required',
		'anio' => 'required',
		'ies' => 'required',
		'autor' => 'required',
		'id_docente' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Publicacioncientifica::find($this->selected_id);
            $record->update([ 
			'doi' => $this-> doi,
			'titulo' => $this-> titulo,
			'anio' => $this-> anio,
			'ies' => $this-> ies,
			'autor' => $this-> autor,
			'id_docente' => $this-> id_docente
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Publicacioncientifica Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Publicacioncientifica::where('id', $id)->delete();
        }
    }
}