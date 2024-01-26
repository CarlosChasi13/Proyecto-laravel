<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Provinciaop;

class Provinciaops extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.provinciaops.view', [
            'provinciaops' => Provinciaop::latest()
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

        Provinciaop::create([ 
			'nombre' => $this-> nombre
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Provinciaop Successfully created.');
    }

    public function edit($id)
    {
        $record = Provinciaop::findOrFail($id);
        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Provinciaop::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Provinciaop Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Provinciaop::where('id', $id)->delete();
        }
    }
}