<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Paisop;

class Paisops extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.paisops.view', [
            'paisops' => Paisop::latest()
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

        Paisop::create([ 
			'nombre' => $this-> nombre
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'País agregado exitosamente.');
    }

    public function edit($id)
    {
        $record = Paisop::findOrFail($id);
        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Paisop::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'País editado exitosamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Paisop::where('id', $id)->delete();
        }
    }
}