<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Departamento;

class Departamentos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $Nombre;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.departamentos.view', [
            'departamentos' => Departamento::latest()
						->orWhere('Nombre', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->Nombre = null;
    }

    public function store()
    {
        $this->validate([
		'Nombre' => 'required',
        ]);

        Departamento::create([ 
			'Nombre' => $this-> Nombre
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Departamento Successfully created.');
    }

    public function edit($id)
    {
        $record = Departamento::findOrFail($id);
        $this->selected_id = $id; 
		$this->Nombre = $record-> Nombre;
    }

    public function update()
    {
        $this->validate([
		'Nombre' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Departamento::find($this->selected_id);
            $record->update([ 
			'Nombre' => $this-> Nombre
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Departamento Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Departamento::where('id', $id)->delete();
        }
    }
}