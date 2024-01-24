<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Campu;

class Campus extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $Nombre, $telefono, $email, $direccion, $provincia, $pais, $maps_url;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.campus.view', [
            'campus' => Campu::latest()
						->orWhere('Nombre', 'LIKE', $keyWord)
						->orWhere('telefono', 'LIKE', $keyWord)
						->orWhere('email', 'LIKE', $keyWord)
						->orWhere('direccion', 'LIKE', $keyWord)
						->orWhere('provincia', 'LIKE', $keyWord)
						->orWhere('pais', 'LIKE', $keyWord)
						->orWhere('maps_url', 'LIKE', $keyWord)
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
		$this->telefono = null;
		$this->email = null;
		$this->direccion = null;
		$this->provincia = null;
		$this->pais = null;
		$this->maps_url = null;
    }

    public function store()
    {
        $this->validate([
		'Nombre' => 'required',
		'telefono' => 'required',
		'email' => 'required',
		'direccion' => 'required',
		'provincia' => 'required',
		'pais' => 'required',
		'maps_url' => 'required',
        ]);

        Campu::create([ 
			'Nombre' => $this-> Nombre,
			'telefono' => $this-> telefono,
			'email' => $this-> email,
			'direccion' => $this-> direccion,
			'provincia' => $this-> provincia,
			'pais' => $this-> pais,
			'maps_url' => $this-> maps_url
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Campu Successfully created.');
    }

    public function edit($id)
    {
        $record = Campu::findOrFail($id);
        $this->selected_id = $id; 
		$this->Nombre = $record-> Nombre;
		$this->telefono = $record-> telefono;
		$this->email = $record-> email;
		$this->direccion = $record-> direccion;
		$this->provincia = $record-> provincia;
		$this->pais = $record-> pais;
		$this->maps_url = $record-> maps_url;
    }

    public function update()
    {
        $this->validate([
		'Nombre' => 'required',
		'telefono' => 'required',
		'email' => 'required',
		'direccion' => 'required',
		'provincia' => 'required',
		'pais' => 'required',
		'maps_url' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Campu::find($this->selected_id);
            $record->update([ 
			'Nombre' => $this-> Nombre,
			'telefono' => $this-> telefono,
			'email' => $this-> email,
			'direccion' => $this-> direccion,
			'provincia' => $this-> provincia,
			'pais' => $this-> pais,
			'maps_url' => $this-> maps_url
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Campu Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Campu::where('id', $id)->delete();
        }
    }
}