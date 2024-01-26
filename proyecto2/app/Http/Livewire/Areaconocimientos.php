<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Areaconocimiento;

class Areaconocimientos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.areaconocimientos.view', [
            'areaconocimientos' => Areaconocimiento::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->nombre = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
        ]);

        Areaconocimiento::create([ 
			'nombre' => $this-> nombre
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Areaconocimiento Successfully created.');
    }

    public function edit($id)
    {
        $record = Areaconocimiento::findOrFail($id);
        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Areaconocimiento::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Areaconocimiento Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Areaconocimiento::where('id', $id)->delete();
        }
    }
}