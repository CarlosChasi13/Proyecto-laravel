<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Periodosacademico;

class Periodosacademicos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nivel, $siglas, $mes_inicio, $año_inicio, $mes_fin, $año_fin;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.periodosacademicos.view', [
            'periodosacademicos' => Periodosacademico::latest()
						->orWhere('nivel', 'LIKE', $keyWord)
						->orWhere('siglas', 'LIKE', $keyWord)
						->orWhere('mes_inicio', 'LIKE', $keyWord)
						->orWhere('año_inicio', 'LIKE', $keyWord)
						->orWhere('mes_fin', 'LIKE', $keyWord)
						->orWhere('año_fin', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->nivel = null;
		$this->siglas = null;
		$this->mes_inicio = null;
		$this->año_inicio = null;
		$this->mes_fin = null;
		$this->año_fin = null;
    }

    public function store()
    {
        $this->validate([
		'nivel' => 'required',
		'siglas' => 'required',
		'mes_inicio' => 'required',
		'año_inicio' => 'required',
		'mes_fin' => 'required',
		'año_fin' => 'required',
        ]);

        Periodosacademico::create([ 
			'nivel' => $this-> nivel,
			'siglas' => $this-> siglas,
			'mes_inicio' => $this-> mes_inicio,
			'año_inicio' => $this-> año_inicio,
			'mes_fin' => $this-> mes_fin,
			'año_fin' => $this-> año_fin
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Periodosacademico Successfully created.');
    }

    public function edit($id)
    {
        $record = Periodosacademico::findOrFail($id);
        $this->selected_id = $id; 
		$this->nivel = $record-> nivel;
		$this->siglas = $record-> siglas;
		$this->mes_inicio = $record-> mes_inicio;
		$this->año_inicio = $record-> año_inicio;
		$this->mes_fin = $record-> mes_fin;
		$this->año_fin = $record-> año_fin;
    }

    public function update()
    {
        $this->validate([
		'nivel' => 'required',
		'siglas' => 'required',
		'mes_inicio' => 'required',
		'año_inicio' => 'required',
		'mes_fin' => 'required',
		'año_fin' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Periodosacademico::find($this->selected_id);
            $record->update([ 
			'nivel' => $this-> nivel,
			'siglas' => $this-> siglas,
			'mes_inicio' => $this-> mes_inicio,
			'año_inicio' => $this-> año_inicio,
			'mes_fin' => $this-> mes_fin,
			'año_fin' => $this-> año_fin
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Periodosacademico Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Periodosacademico::where('id', $id)->delete();
        }
    }
}